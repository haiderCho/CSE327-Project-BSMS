<?php
    // Database connection parameters
    $hostname = "localhost";  // Hostname or IP address of the database server
    $username = "root";       // Database username
    $password = "";           // Database password
    $databaseName = "BSMS";   // Database name

    // Create connection to the database
    $link = mysqli_connect($hostname, $username, $password, $databaseName);

    // Check if the connection was successful
    if (!$link) {
        echo "Connection unsuccessful";  // Message to display if connection fails
        die("Connection failed: " . mysqli_connect_error());
    }
?>
