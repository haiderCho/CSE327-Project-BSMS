<?php
    // Start the session to handle session variables
    session_start();

    // Check if the form is submitted
    if (!empty($_POST)) {
        extract($_POST);
        $_SESSION['error'] = array();

        // Check if the category name is empty
        if (empty($cat)) {
            $_SESSION['error'][] = "Please enter Category Name";
            // Redirect back to the category_edit.php page with the corresponding ID
            header("location:category_edit.php?id=$id");
        } else {
            // Include the database connection file
            include("../includes/connection.php");

            // Update the category name in the database
            $q = "UPDATE category
                SET cat_nm = '$cat'
                WHERE cat_id = $id";
            $res = $link->query($q);

            // Redirect to the category_view.php page after successful update
            header("location:category_view.php");
        }
    } else {
        // Redirect to the category_view.php page if the form is not submitted
        header("location:category_view.php");
    }
?>
