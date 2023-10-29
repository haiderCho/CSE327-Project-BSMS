<?php

	session_start();
	
	if(! empty($_POST))
	{
		extract($_POST);
		$_SESSION['error']=array();

		if(empty($unm) || empty($pwd))
		{
			$_SESSION['error'][]="Please enter User Name or Password";

			header("location:login.php");
		}
		else
		{
			include("includes/connection.php");

			$sql="SELECT * FROM register WHERE r_unm='$unm' and r_pwd='$pwd'";
			$result = $link->query($sql);
			$row = $result->fetch_assoc();

			if(! empty($row))
			{
				$_SESSION['client']['unm']=$row['r_fnm'];
				$_SESSION['client']['id']=$row['r_id'];
				$_SESSION['client']['status']=true;

				header("location:index.php");
			}
			else
			{
				$_SESSION['error'][]="Wrong Username or Password";
				header("location:login.php");
			}
		}
	}
	else
	{
		header("location:login.php");
	}

?>