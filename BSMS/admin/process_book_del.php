<?php
    // Start the session to handle session variables
    session_start();

    // Include the database connection file
    include("../includes/connection.php");

    // Construct a DELETE query to remove the book with the specified ID from the database
    $query = "DELETE FROM book WHERE book_id =" . $_GET['id'];

    // Execute the query
    $res = $link->query($query);

    // Redirect the user to the category_view.php page after deletion
    header("location:category_view.php");
?>
