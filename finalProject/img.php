<?php include 'db.php';
?>
<?php
// $qry = "SELECT * FROM client;";
// $data = mysqli_query($conn, $qry);
// $rows = mysqli_fetch_assoc($data);
// echo $rows['name'] . " " . $rows['id'];
$qry = "SELECT * FROM client;";
$data = mysqli_query($conn, $qry);
$rows = mysqli_fetch_assoc($data);
echo "<img src=" . $rows['filelocation'] . ">";
?>