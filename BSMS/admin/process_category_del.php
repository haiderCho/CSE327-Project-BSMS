<?php

	session_start();
	
	include("../includes/connection.php");

	$q = "DELETE FROM category WHERE cat_id =".$_GET['id'];

	$res = $link -> query($q);

	header("location:category_view.php");

?>