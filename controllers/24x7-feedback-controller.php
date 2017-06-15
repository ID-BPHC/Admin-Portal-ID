<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location: ../login.php");
	die();
}
?>
<?php
require_once(__DIR__ . "/../includes/functions.php");

$perPage = prep($_GET['perPage']);
$currentPage = prep($_GET['currentPage']);
$instructor = prep($_GET['instructor']);
$query = mysqli_query($con, "SELECT * FROM feedback_record WHERE SentStatus LIKE 'YES'");
$result = array();

if($query && $perPage > 0 && $currentPage > 0)
{
	$num = mysqli_num_rows($query);
	$totalPages = ceil($num/$perPage);
	$result['totalPages'] = $totalPages;
	if($currentPage <= $totalPages)
	{
		$offset = (($currentPage - 1) * $perPage);
		
		if($instructor == "all")
		{
		$pageQuery = mysqli_query($con, "SELECT Course,Section,InsName,Feedback,time FROM feedback_record WHERE SentStatus LIKE 'YES' LIMIT $perPage OFFSET $offset");
		}
		else
		{
		$pageQuery = mysqli_query($con, "SELECT Course,Section,InsName,Feedback,time FROM feedback_record WHERE InsName LIKE '$instructor' AND SentStatus LIKE 'YES' LIMIT $perPage OFFSET $offset");
		$result['totalPages'] = ceil(mysqli_num_rows($pageQuery)/$perPage);
		}
		if($pageQuery)
		{
			$row['status'] = 200;
			while($row = mysqli_fetch_array($pageQuery, MYSQLI_ASSOC))
			{
				$row["time"] = strftime("%e %B %G %r", strtotime($row['time']));
				array_push($result, utf8ize($row));
			}
			echo json_encode($result);
		}
		else
		{
			$result['status'] = 100;
			$result['msg'] = "Page query failed"; 
			echo json_encode($result);
		}
	}
	else
	{
		$result['status'] = 100;
		$result['msg'] = "Current page number can't be greater than the total pages"; 
		echo json_encode($result);
	}
}
else
{
	$result['status'] = 100;
	$result['msg'] = "Query failed or invalid parameters"; 
	echo json_encode($result);
}

?>