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
<form action="controllers/import-csv-process.php" method="post" enctype="multipart/form-data" class="upload-form">
	<div class="form-group">
		<label for="course-detail-upload">Select CSV file to upload:</label>
		<input type="file" name="course-detail-upload" id="course-detail-upload" class="form-control">
	</div>
	<div class="checkbox">
		<label><input type="checkbox" value="del-courses" name="truncate-courses" id="truncate-courses">Delete Old Content</label>
	</div>
	<button type="submit" class="btn btn-primary btn-block" name="submit-course-details" id="submit-course-details">Upload</button>
</form>