<?php
    // Start the session to handle session variables
    session_start();

    // Include the database connection file
    include("../includes/connection.php");

    // Construct a DELETE query to remove the contact with the specified ID from the database
    $query = "DELETE FROM contact WHERE c_id =" . $_GET['id'];

    // Execute the query
    $res = $link->query($query);

    // Redirect the user to the contact_view.php page after deletion
    header("location: contact_view.php");
?>
