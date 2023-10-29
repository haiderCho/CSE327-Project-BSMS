<?php

	session_start();
	
	include("../includes/connection.php");

	$query = "DELETE FROM book WHERE book_id =".$_GET['id'];

	$res = $link -> query($query);

	header("location:category_view.php");

?>