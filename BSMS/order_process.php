<?php
// Start or resume the session.
	session_start();

	include("includes/connection.php");
//include database connection.
	if(!empty($_POST))
	{
		// Extract all POST and SESSION variables.
		extract($_POST);
		extract($_SESSION);

		$_SESSION['error']=array();   //session error array
		if(empty($fnm))
		{
			$_SESSION['error'][]="Enter Full Name";	//validate full name.
		}

		if(empty($add))
		{
			$_SESSION['error'][]="Enter Full Address"; //validate address.
		}

		if(empty($pc))
		{
			$_SESSION['error'][]="Enter City Pincode";	//validate city pin.
		}

		if(empty($city))
		{
			$_SESSION['error'][]="Enter City";	//validate city.
		}

		if(empty($state))
		{
			$_SESSION['error']['state']="Enter State";	//validate state.
		}

		if(empty($mno))
		{
			$_SESSION['error'][]="Enter Mobile Number";	//validate phone number.
		}
		else if(!is_numeric($mno))
		{
			$_SESSION['error'][]="Enter Mobile Number in Numbers";	//checking if mobile number is numeric or not.
		}


		//// If there are validation errors, redirect back to the order form.
		if(!empty($_SESSION['error']))
		{
			header("location:order.php");
		}
		else
		{

			// Retrieve the client's ID from the session.
			$rid=$_SESSION['client']['id'];
			//sql query to insert the order to database.
			$sql="INSERT INTO `bsms`.`order` (
						`o_id` ,
						`o_name` ,
						`o_address` ,
						`o_pincode` ,
						`o_city` ,
						`o_state` ,
						`o_mobile` ,
						`o_rid`
						)
						VALUES (
						NULL , '$fnm', '$add', '$pc', '$city', '$state', '$mno', '$rid'
						)";

			$res = $link->query($sql);	//run query.

			header("location:order.php?order");
		}
	}
	else
	{
		header("location:order.php");
		//If there are no posted data then redirect to the order page.
	}
?>