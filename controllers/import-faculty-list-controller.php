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
		<label for="faculty-list-upload">Select CSV file to upload:</label>
		<input type="file" name="faculty-list-upload" id="faculty-list-upload" class="form-control">
	</div>
	<div class="checkbox">
		<label><input type="checkbox" value="del" name="truncate-faculty" id="truncate-faculty">Delete Old Content</label>
	</div>
	<button type="submit" class="btn btn-primary btn-block" name="submit-faculty-list" id="submit-faculty-list">Upload</button>
</form>