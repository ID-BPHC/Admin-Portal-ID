<?php
require_once("db.php");


function prep($x)
{
	global $con;
	return mysqli_real_escape_string($con, stripslashes($x));
}


function redirect($location)
{
	echo "<script>window.location.replace(\"{$location}\")</script>";
}
?>