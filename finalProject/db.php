<?php

#Set local varibale inorder to collect server and db info
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "student";

#establish connection using the above info by the method called mysqli_connect
$conn = mysqli_connect($serverName, $userName,  $password, $databaseName);

#test the connection is establishsed or not
if (!$conn) {
    die("Database failed to connect due to " . mysqli_connect_error());
} else {
    //echo "Database connected sucessfully!";
}
?>