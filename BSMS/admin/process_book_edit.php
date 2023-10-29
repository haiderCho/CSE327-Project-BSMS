<?php
    // Start the session to handle session variables
    session_start();

    // Include the database connection file
    include("../includes/connection.php");

    // Check if the form is submitted
    if (!empty($_POST)) {
        $_SESSION['error'] = array();
        extract($_POST);

        // Check if Book Name is empty
        if (empty($bnm)) {
            $_SESSION['error']['bnm'] = "Enter Book Name";
        }

        // Check if Description is empty
        if (empty($desc)) {
            $_SESSION['error']['desc'] = "Enter Book Description";
        }

        // Check if Price is empty or not numeric
        if (empty($price) || !is_numeric($price)) {
            $_SESSION['error']['price'] = "Enter Book Price in Numbers";
        }

        // Check if an image is uploaded and validate its type
        if (empty($_FILES['b_img']['name'])) {
            $_SESSION['error']['b_img'] = "Please provide a file";
        } else if ($_FILES['b_img']['error'] > 0) {
            $_SESSION['error']['b_img'] = "Error uploading file";
        } else if (!(strtoupper(substr($_FILES['b_img']['name'], -4)) == ".JPG" || strtoupper(substr($_FILES['b_img']['name'], -5)) == ".JPEG" || strtoupper(substr($_FILES['b_img']['name'], -4)) == ".GIF")) {
            $_SESSION['error']['b_img'] = "Wrong file type";
        }

        // If there are errors, redirect back to book_edit.php
        if (!empty($_SESSION['error'])) {
            header("location:book_edit.php");
        } else {
            // Get current time for timestamp and move the uploaded image to the appropriate directory
            $t = time();
            move_uploaded_file($_FILES['b_img']['tmp_name'], "../book_img/" . $_FILES['b_img']['name']);
            $b_img = "book_img/" . $_FILES['b_img']['name'];

            // Update book details in the database
            $q = "UPDATE book SET b_nm='$bnm', b_cat='$cat', b_desc='$desc', b_price=$price, b_img='$b_img', b_time='$t' WHERE b_id=" . $id;
            $res = $link->query($q);

            // Redirect to book_view.php after successful update
            header("location:book_view.php");
        }
    } else {
        // Redirect to book_view.php if the form is not submitted
        header("location:book_view.php");
    }
?>
