<?php
	// Start the session
	session_start();
	
	// Check if the POST array is not empty
	if(!empty($_POST)) {
		// Extract the values from the POST array
		extract($_POST);
		$_SESSION['error'] = array();

		// Check if the username or password fields are empty
		if(empty($unm) || empty($pwd)) {
			// Set error message and redirect to login page
			$_SESSION['error'][] = "Please enter User Name or Password";
			header("location:login.php");
		} else {
			// Include the database connection file
			include("includes/connection.php");

			// Create SQL query to check if the username and password exist in the database
			$sql = "SELECT * FROM register WHERE r_unm='$unm' and r_pwd='$pwd'";
			$result = $link->query($sql);
			$row = $result->fetch_assoc();

			// Check if the query result is not empty
			if(!empty($row)) {
				// Set session variables for the user and their ID
				$_SESSION['client']['unm'] = $row['r_fnm'];
				$_SESSION['client']['id'] = $row['r_id'];
				$_SESSION['client']['status'] = true;

				// Redirect to the index page
				header("location:index.php");
			} else {
				// Set error message for wrong username or password and redirect to login page
				$_SESSION['error'][] = "Wrong Username or Password";
				header("location:login.php");
			}
		}
	} else {
		// If POST array is empty, redirect to login page
		header("location:login.php");
	}
?>