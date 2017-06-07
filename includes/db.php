<?php
define("DB_USER", "sohail");
define("DB_PASSWORD", "");
define("DB_HOST", "localhost");
define("DB_NAME", "admin");
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$con)
{
	die("SQL Connection Failed. " . mysqli_connect_error());
}
?>