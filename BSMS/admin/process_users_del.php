<?php
    // Start the session to handle session variables
    session_start();
    
    // Include the database connection file
    include("../includes/connection.php");

    // Construct a DELETE query to remove the user with the specified ID from the database
    $query = "DELETE FROM register WHERE r_id =" . $_GET['id'];

    // Execute the query
    $result = $link->query($query);

    // Redirect the user to the users_view.php page after deletion
    header("location: users_view.php");
?>
