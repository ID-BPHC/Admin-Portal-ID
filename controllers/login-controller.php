<?php
session_start();
include(__DIR__ . "/../includes/functions.php");
if(isset($_POST['submit']))
{
	$username = prep($_POST['username']);
	$password = prep(md5($_POST['password']));
	$query = mysqli_query($con, "SELECT username FROM users WHERE username LIKE '$username' AND password LIKE '$password'");
	if($query)
	{
		if(mysqli_num_rows($query) == 1)
		{
			$_SESSION['username'] = $username;
			header("Location: ../index.php");
			die();
		}
		else
		{
			header("Location: ../login.php?fail=1");
			die();
		}
	}
	else
	{
		die("Query Failed !" . mysqli_error($con));
	}
}
?>