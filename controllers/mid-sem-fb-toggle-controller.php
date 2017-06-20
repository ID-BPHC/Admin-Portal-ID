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
	mysqli_query($con, "TRUNCATE TABLE mid_sem_toggle");
	header("Location: ../mid-sem-feedback-config.php");
	die();
}

if(isset($_POST['onButton']))
{
	$start = prep($_POST['startDate']);
	$end = prep($_POST['endDate']);
	$q = mysqli_query($con, "INSERT INTO mid_sem_toggle VALUES('$start', '$end')");
	if(!$q)
	{
		die(mysqli_error($con));
	}
	header("Location: ../mid-sem-feedback-config.php");
}
?>
<?php
$time = time();
$checkStatus = mysqli_query($con, "SELECT * FROM mid_sem_toggle WHERE UNIX_TIMESTAMP(start) <= $time AND UNIX_TIMESTAMP(end) >= $time");

if(!$checkStatus)
{
	die(mysqli_error($con));
}

if(mysqli_num_rows($checkStatus) == 0)
{
	echo "<h3>Current Status : <span id=\"off\">OFF</span></h3>";
	echo "<form action=\"controllers/mid-sem-fb-toggle-controller.php\" method=\"POST\">";
	echo "<div class=\"form-group\">";
	echo "<label for=\"startDate\">Choose Starting Date</label>";
	echo "<input data-toggle=\"datepicker\" class=\"form-control\" name=\"startDate\" id=\"startDate\">";
	echo "</div>";
	echo "<div class=\"form-group\">";
	echo "<label for=\"endDate\">Choose Ending Date</label>";
	echo "<input data-toggle=\"datepicker\" class=\"form-control\" name=\"endDate\" id=\"endDate\">";
	echo "</div>";
	echo "<button class=\"btn btn-primary btn-block\" id=\"onButton\" type=\"submit\" name=\"onButton\">Turn On Feedbacks</button>";
	echo "</form>";
}
else
{
	$result = mysqli_fetch_array($checkStatus);
	$till = strftime("%d %b, %G", strtotime($result['end']));
	echo "<h3>Current Status : <span id=\"on\">Running till </span><span id=\"flash\">{$till}</span></h3>";
	echo "<form action=\"controllers/mid-sem-fb-toggle-controller.php\" method=\"POST\">";
	echo "<button class=\"btn btn-primary btn-block\" id=\"offButton\" type=\"submit\" name=\"offButton\">Turn Off Feedbacks</button>";
	echo "</form>";
}
?>