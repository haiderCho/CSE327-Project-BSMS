<?php
	// Start the session
	session_start();

	// Check if the POST array is not empty
	if(!empty($_POST)) {
		// Extract the values from the POST array
		extract($_POST);
		$_SESSION['error'] = array();

		// Check for empty full name field
		if(empty($fnm)) {
			$_SESSION['error']['fnm'] = "Please enter Full Name";
		}

		// Check for empty username field
		if(empty($unm)) {
			$_SESSION['error']['unm'] = "Please enter User Name";
		}

		// Check for empty or mismatched password fields
		if(empty($pwd) || empty($cpwd)) {
			$_SESSION['error']['pwd'] = "Please enter Password";
		} else if($pwd != $cpwd) {
			$_SESSION['error']['pwd'] = "Password isn't Match";
		} else if(strlen($pwd) < 8) {
			$_SESSION['error']['pwd'] = "Please Enter Minimum 8 Digit Password";
		}

		// Check for empty or invalid email address
		if(empty($email)) {
			$_SESSION['error']['email'] = "Please enter E-Mail Address";
		} else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/", $email)) {
			$_SESSION['error']['email'] = "Please Enter Valid E-Mail Address";
		}

		// Check for empty security answer
		if(empty($answer)) {
			$_SESSION['error']['answer'] = "Please Enter Security Answer";
		}

		// Check for empty contact number or non-numeric characters in the contact number
		if(empty($cno)) {
			$_SESSION['error']['cno'] = "Please Contact Number";
		}
		if(!empty($cno)) {
			if(!is_numeric($cno)) {
				$_SESSION['error']['cno'] = "Please Enter Contact Number in Numbers";
			}
		}

		// Display any errors
		if(!empty($error)) {
			foreach($error as $er) {
				echo '<font color="red">'.$er.'</font><br>';
			}
		}

		// Check for session errors and redirect to the register page if errors are present
		if(!empty($_SESSION['error'])) {
			header("location:register.php");
		} else {
			// Include the database connection file
			include("includes/connection.php");

			// Get the current time
			$t = time();

			// Insert the user details into the database
			$sql = "INSERT INTO register(r_fnm,r_unm,r_pwd,r_cno,r_email,r_question,r_answer,r_time) VALUES ('$fnm','$unm','$pwd','$cno','$email','$question','$answer','$t')";
			$link->query($sql);

			// Redirect to the register page with a success message
			header("location:register.php?register");
		}
	} else {
		// Redirect to the register page if the POST array is empty
		header("location:register.php");
	}
?>