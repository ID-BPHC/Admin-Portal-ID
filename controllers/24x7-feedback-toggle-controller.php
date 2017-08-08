<?php
require_once( __DIR__ . "/../includes/functions.php" );
if ( !is_session_started() ) {
	session_start();
}
if ( !isset( $_SESSION[ 'username' ] ) ) {
	header( "Location: ../login.php" );
	die();
}
?>
<?php
if(isset($_POST['offButton']))
{
	$time = time() - 10;
	mysqli_query($con, "UPDATE portals SET end = NULL, start = NULL WHERE name LIKE '24x7'");
	header("Location: ../24x7-feedback-toggle.php");
	die();
}

if(isset($_POST['onButton']))
{
	$q = mysqli_query($con, "UPDATE portals SET start = '2008-01-01', end = '9999-12-31' WHERE name LIKE '24x7'");
	if(!$q)
	{
		die(mysqli_error($con));
	}
	header("Location: ../24x7-feedback-toggle.php");
	die();
}
?>
<?php
$checkStatus = mysqli_query($con, "SELECT * FROM portals WHERE start <= CURRENT_DATE AND end >= CURRENT_DATE AND name LIKE '24x7'");

if(!$checkStatus)
{
	die(mysqli_error($con));
}

if(mysqli_num_rows($checkStatus) == 0)
{
	echo "<h3>Current Status : <span id=\"off\">OFF</span></h3>";
	echo "<form action=\"controllers/24x7-feedback-toggle-controller.php\" method=\"POST\">";
	echo "<button class=\"btn btn-primary btn-block\" id=\"onButton\" type=\"submit\" name=\"onButton\">Turn On Feedbacks</button>";
	echo "</form>";
}
else
{
	echo "<h3>Current Status : <span id=\"on\">Running</span></h3>";
	echo "<form action=\"controllers/24x7-feedback-toggle-controller.php\" method=\"POST\">";
	echo "<button class=\"btn btn-primary btn-block\" id=\"offButton\" type=\"submit\" name=\"offButton\">Turn Off Feedbacks</button>";
	echo "</form>";
}
?>