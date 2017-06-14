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
	$query = mysqli_query($con, "SELECT DISTINCT(InsName) FROM feedback_record ORDER BY InsName ASC");
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		echo "<option value=\"{$row['InsName']}\">" . $row['InsName'] . "</option>";
	}
	?>
</select>
</div>

<div class="form-group">
<label for="perPage">Records Per Page</label>
<select name="perPage" id="perPage" class="form-control">
	<option value="1">1</option>
	<option value="5">5</option>
	<option value="10">10</option>
	<option value="15">15</option>
	<option value="20">20</option>
	<option value="50">50</option>
	<option value="100">100</option>
</select>
</div>