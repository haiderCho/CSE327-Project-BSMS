<?php

	session_start();

	include("../includes/connection.php");

	if(!empty($_POST))
	{
		$_SESSION['error']=array();
		extract($_POST);

		if(empty($unm) || empty($pwd))
		{
			$_SESSION['error'][]="Required User Name & Password";

			header("location:login.php");
		}
		else
		{
			$sql="SELECT * FROM admin WHERE a_unm='$unm' and a_pwd='$pwd'";
			$result = $link->query($sql);
			$row = $result->fetch_assoc();

			if(!empty($row))
			{
				$_SESSION['admin']['unm']=$row['a_unm'];
				$_SESSION['admin']['status']=true;

				header("location:index.php");
			}
			else
			{
				$_SESSION['error'][]="Wrong User Name or Password";

				header("location:login.php");
			}
		}
	}
	else
	{
		header("location:login.php");
	}
?>