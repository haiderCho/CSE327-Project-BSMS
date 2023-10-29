<?php

	session_start();
	
	include("../includes/connection.php");

	$query = "DELETE FROM register WHERE r_id =".$_GET['id'];

	$result = $link -> query($query);

	header("location:users_view.php");
?>