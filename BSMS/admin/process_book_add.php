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

        // If there are errors, redirect back to book_add.php
        if (!empty($_SESSION['error'])) {
            header("location:book_add.php");
        } else {
            // Move the uploaded image to the appropriate directory
            move_uploaded_file($_FILES['b_img']['tmp_name'], "../book_img/" . $_FILES['b_img']['name']);
            $b_img = "book_img/" . $_FILES['b_img']['name'];

            // Insert book details into the database
            $sql = "INSERT INTO book(b_nm, b_cat, b_desc, b_price, b_img) VALUES('$bnm', '$cat', '$desc', '$price', '$b_img')";
            $res = $link->query($sql);

            // Redirect back to book_add.php after successful insertion
            header("location:book_add.php");
        }
    } else {
        // Redirect to book_add.php if the form is not submitted
        header("location:book_add.php");
    }
?>
