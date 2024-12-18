<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee ID Card</title>
    <link rel="stylesheet" href="stylegenerator">
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <style>
        /* Hide unnecessary elements for printing */
        @media print {

            #name,
            #department,
            #image,
            #qr-container {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div align="center">
        <fieldset>
            <legend>
                <h1>Generator QR Code</h1>
            </legend>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <label for="stid">Student ID:</label>
                <input type="text" id="stid" name="stid" required><br><br>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="name">ID:</label>
                <input type="text" id="id" name="id" required><br><br>

                <!-- <label for="department">Department:</label>
                <select id="department" name="department" required>
                    <option value="" selected="false">Select Department</option>
                    <option value="computerscience">Computer Science</option>
                    <option value="marketing">Marketing</option>
                    <option value="accounting">Accounting</option>
                </select><br><br> -->

                <label for="image">Upload Image:</label>
                <input type="text" id="filelocation" name="filelocation"><br><br>

                <input type="submit" value="Submit">
            </form>
        </fieldset>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "student";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['name'];
        $filelocation = $_POST['filelocation'];
        // Handle image upload and save its path in the database
        // $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        //$imageData = $_POST['image'];
        $id = $_POST['id'];
        $studId = $_POST['stid'];
        $sql = "INSERT INTO client (stid, name, id, filelocation) VALUES ('$studId', ' $name', '$id',  '$filelocation' )";
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // Assume you just inserted a new record with an auto-incremented ID
        //$newRecordId = $conn->insert_id;

        // Retrieve data for the new record
        $sql = "SELECT name, id, filelocation FROM client WHERE stid = $studId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $id = $row['id'];
            $imageData = $row['filelocation'];

            // Display the data
            echo "Name: $name<br>";
            echo "Department: $id<br>";
            // echo "<img src='data:image/jpeg;base64,$imageData' alt='Employee ///Photo'>";

            // Generate QR code with auto-incremented ID
            echo "<div id='qr-container'></div>";
            echo "<script>
                const qrCode = new QRCode('qr-container', {
                    text: '$studId', // Set the content (auto-incremented ID)
                    width: 256,
                    height: 256,
                    colorDark: '#000000',
                    colorLight: '#ffffff',
                    correctLevel: QRCode.CorrectLevel.H
                });
            </script>";
        } else {
            echo "No records found.";
        }

        $conn->close();
    }
    ?>

    <!-- Print button -->
    <button name="printBtn" onclick="window.print()">Print ID Card</button>
</body>

</html>