<?php
    // Start the session to handle session variables
    session_start();

    // Destroy the session to log out the user
    session_destroy();

    // Redirect to the index.php page after destroying the session
    header("location: index.php");
?>
