<?php
	// Start the session
	session_start();

	// Destroy the current session
	session_destroy();

	// Redirect to the index page
	header("location:index.php");
?>