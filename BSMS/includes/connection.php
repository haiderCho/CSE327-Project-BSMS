<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "BSMS";

// Create connection
$link = mysqli_connect($hostname, $username, $password, $databaseName);

// Check connection
if (!$link) {
    echo "Connected unsuccessfully";
    die("Connection failed: " . mysqli_connect_error());
}
?>