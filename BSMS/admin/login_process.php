<?php
    // Start the session to handle session variables
    session_start();

    // Include the database connection file
    include("../includes/connection.php");

    // Check if the form is submitted
    if (!empty($_POST)) {
        $_SESSION['error'] = array();
        extract($_POST);

        // Check if User Name or Password is empty
        if (empty($unm) || empty($pwd)) {
            $_SESSION['error'][] = "Required User Name & Password";
            header("location:login.php");
        } else {
            // Query the database to check if the provided credentials match an admin record
            $sql = "SELECT * FROM admin WHERE a_unm='$unm' and a_pwd='$pwd'";
            $result = $link->query($sql);
            $row = $result->fetch_assoc();

            // If a matching admin record is found, set session variables and redirect to index.php
            if (!empty($row)) {
                $_SESSION['admin']['unm'] = $row['a_unm'];
                $_SESSION['admin']['status'] = true;
                header("location:index.php");
            } else {
                // If no matching record is found, set an error message and redirect back to login.php
                $_SESSION['error'][] = "Wrong User Name or Password";
                header("location:login.php");
            }
        }
    } else {
        // Redirect to login.php if the form is not submitted
        header("location:login.php");
    }
?>
