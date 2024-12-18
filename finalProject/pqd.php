<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $scannedData = $_POST["scannedData"];
    $qry = "SELECT * FROM client WHERE stid = '$scannedData';";
    $data = mysqli_query($conn, $qry);

    if ($rows = mysqli_fetch_assoc($data)) {
        // Found a student, send back name, id, and image path
        echo json_encode([
            'name' => $rows['name'],
            'id' => $rows['id'],
            'imagePath' => $rows['filelocation']
        ]);
    } else {
        // No student found, send back a different message
        echo json_encode(['message' => "No student found."]);
    }
}
?>
