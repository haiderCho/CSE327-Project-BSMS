<?php
	session_start();
	
	include("../includes/connection.php");

	$query="DELETE FROM contact WHERE c_id =".$_GET['id'];

    $res = $link -> query($query);

    $run = $res->fetch_assoc();

	header("location:contact_view.php");
?>