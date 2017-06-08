<?php
require_once(__DIR__ . "/../includes/functions.php");
if(!is_session_started())
{
	session_start();
}
if(!isset($_SESSION['username']))
{
	header("Location: ../login.php");
	die();
}
?>

<div class="form-group">
<select name="instructors" id="instructors" class="form-control">
	<option value="nil">------</option>
	<option value="all">All Instructors</option>
	<?php
	$query = mysqli_query($con, "SELECT DISTINCT(Name) FROM courses_faculty");
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		echo "<option value=\"{$row['Name']}\">" . $row['Name'] . "</option>";
	}
	?>
</select></div>