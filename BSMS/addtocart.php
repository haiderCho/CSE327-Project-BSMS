<?php
	session_start();

	if(isset($_GET['bcid']))
	{

		// Database connection and book fetching logic
    	// Add the book to the cart session

		include("includes/connection.php");

		$sql = "SELECT * FROM book WHERE b_id=".$_GET['bcid'];

		$result = $link->query($sql);

		$row = $result->fetch_assoc();

		$_SESSION['cart'][]=array("nm"=>$row['b_nm'],"img"=>$row['b_img'],"price"=>$row['b_price'],"qty"=>1);
	}

	else if(!empty($_POST))
	{
		// Loop through POST parameters and update cart quantities
		foreach($_POST as $id=>$qty)
		{
			$_SESSION['cart'][$id]['qty']=$qty;
		}
	}

	else if(isset($_GET['id']))
	{
		// Remove the book from the cart session
		$id=$_GET['id'];
		unset($_SESSION['cart'][$id]);
	}

	header("location:cart.php");
		//redirection
?>