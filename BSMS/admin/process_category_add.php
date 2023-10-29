<?php
    // Start the session to handle session variables
    session_start();

    // Check if the form is submitted
    if (!empty($_POST)) {
        $_SESSION['error'] = array();
        extract($_POST);

        // Check if the category name is empty
        if (empty($cat)) {
            $_SESSION['error']['cat'] = "Please Enter Category Name";
        }

        // Redirect back to category_add.php if there are errors in the form
        if (!empty($_SESSION['error']['cat'])) {
            header("location:category_add.php");
        } else {
            // Include the database connection file
            include("../includes/connection.php");

            // Insert the new category into the database
            $q = "INSERT INTO category(cat_nm) VALUES('$cat')";
            $link->query($q);

            // Redirect back to category_add.php after successful insertion
            header("location:category_add.php");
        }
    } else {
        // Redirect to category.php if the form is not submitted
        header("location:category.php");
    }
?>
