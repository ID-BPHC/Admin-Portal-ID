<?php

session_start();
if(!isset($_SESSION['username']))
{
header("Location: ../login.php");
die();
}

require_once(__DIR__ . "/../includes/functions.php");

// Course Details Upload

if (isset($_POST["submit-course-details"])) {

   if (isset($_FILES["course-detail-upload"])) {

        $f = $_FILES["course-detail-upload"];

        if ($f["error"] > 0) 
        {
                echo "<script>";
                echo "alert(\"{$f['error']}}\");";
                echo "window.location.replace(\"../import-csv.php\")";
                echo "</script>";
        }
        else 
        {
            $nameArray = explode(".", $f['name']);
            $ext = end($nameArray);            
            if(($ext == "csv") || ($ext == "CSV"))
            {
                $storagename = "courses.csv";
                $mv = move_uploaded_file($f["tmp_name"], __DIR__ . "/../upload/" . $storagename);
                
                if(!$mv)
                {
                    echo "File move failed. Please check the required permissions.";
                    die();
                }

                $csv_file = __DIR__ . "/../upload/courses.csv";
                $success = 1;
                $msg = "Records Updated !";
                $handle = fopen($csv_file, "r");
                if($handle)
                {
					
					if(isset($_POST['truncate-courses']))
					{
						mysqli_query($con, "TRUNCATE TABLE courses_faculty");
					}
					
					$c = 0;
					
                    while($row = fgetcsv($handle, 1000, ","))
                    {
                        $cID = prep($row[0]);
                        $cTitle = prep($row[1]);
                        $section = prep($row[2]);
						$name = prep($row[3]);
						$email = prep($row[4]);
						
						$q1 = mysqli_query($con, "SELECT * FROM courses_faculty WHERE CourseID LIKE '$cID' AND CourseTitle LIKE '$cTitle' AND Section LIKE '$section' AND Name LIKE '$name' AND email LIKE '$email'");
						
						if(!$q1)
						{
							die("Check Query Failed !");
						}
						
						if(mysqli_num_rows($q1) > 0)
						{
							$c = $c + 1;
							continue;
						}
						
                        $q = mysqli_query($con, "INSERT INTO courses_faculty(CourseID, CourseTitle, Section, Name, email) VALUES ('$cID', '$cTitle', '$section', '$name', '$email')");
                        if(!$q)
                        {
                            $msg = "ERROR : " . mysqli_error($con);
                            $success = 0;
                        }
                    }
					
					if($c > 0)
					{
						echo "<script>";
						echo "alert(\"Ignored {$c} Duplicates\");";
						echo "</script>";
                
					}

                    echo "<script>";
                    echo "alert(\"{$msg}\");";
                    echo "window.location.replace(\"../import-csv.php\")";
                    echo "</script>";
                
                }
                else
                {
                echo "<script>";
                echo "alert(\"Could Not Open File !\");";
                echo "window.location.replace(\"../import-csv.php\")";
                echo "</script>";
                }


            }
            else
            {
                echo "<script>";
                echo "alert(\"Only CSV Files Please !\");";
                echo "window.location.replace(\"../import-csv.php\")";
                echo "</script>";
            }            
        }
     } 
     else 
     {
        echo "<script>";
        echo "alert(\"No File Selected !\");";
        echo "window.location.replace(\"../import-csv.php\")";
        echo "</script>";
     }
} 
elseif(!(isset($_POST["submit-faculty-list"])))
{
    echo "<script>";
    echo "alert(\"No Form Data !!!\");";
    echo "window.location.replace(\"../import-csv.php\")";
    echo "</script>";
}

//Faculty List Upload

if ( isset($_POST["submit-faculty-list"]) && !isset($_POST["submit-course-details"])) {

   if (isset($_FILES["faculty-list-upload"])) {

        $f = $_FILES["faculty-list-upload"];

        if ($f["error"] > 0) 
        {
                echo "<script>";
                echo "alert(\"{$f['error']}}\");";
                echo "window.location.replace(\"../import-csv.php\")";
                echo "</script>";
        }
        else 
        {
            $nameArray = explode(".", $f['name']);
            $ext = end($nameArray);            
            if(($ext == "csv") || ($ext == "CSV"))
            {
                $storagename = "faculty.csv";
                $mv = move_uploaded_file($f["tmp_name"], __DIR__ . "/../upload/" . $storagename);
                
                if(!$mv)
                {
                    echo "File move failed. Please check the required permissions.";
                    die();
                }

                $csv_file = __DIR__ . "/../upload/faculty.csv";
                $success = 1;
                $msg = "Records Updated !";
                $handle = fopen($csv_file, "r");
                if($handle)
                {
					
					if(isset($_POST['truncate-faculty']))
					{
						mysqli_query($con, "TRUNCATE TABLE faculty_email");
					}
					
					$c = 0;
					
                    while($row = fgetcsv($handle, 500, ","))
                    {
                        $sno = prep($row[0]);
                        $name = prep($row[1]);
                        $email = prep($row[2]);
						$q1 = mysqli_query($con, "SELECT * FROM faculty_email WHERE EmailID like '$email'");
						
						if(!$q1)
						{
							die("Check Query Failed !");
						}
						
						if(mysqli_num_rows($q1) > 0)
						{
							$c = $c + 1;
							continue;
						}
                        $q = mysqli_query($con, "INSERT INTO faculty_email(SNo, FacultyName, EmailID) VALUES ('$sno', '$name', '$email')");
                        if(!$q)
                        {
                            $msg = "ERROR : " . mysqli_error($con);
                            $success = 0;
                        }
                    }
					
					if($c > 0)
					{
						echo "<script>";
						echo "alert(\"Ignored {$c} Duplicates\");";
						echo "</script>";
                
					}

                    echo "<script>";
                    echo "alert(\"{$msg}\");";
                    echo "window.location.replace(\"../import-csv.php\")";
                    echo "</script>";
                
                }
                else
                {
                echo "<script>";
                echo "alert(\"Could Not Open File !\");";
                echo "window.location.replace(\"../import-csv.php\")";
                echo "</script>";
                }


            }
            else
            {
                echo "<script>";
                echo "alert(\"Only CSV Files Please !\");";
                echo "window.location.replace(\"../import-csv.php\")";
                echo "</script>";
            }            
        }
     } 
     else 
     {
        echo "<script>";
        echo "alert(\"No File Selected !\");";
        echo "window.location.replace(\"../import-csv.php\")";
        echo "</script>";
     }
} 
elseif(!(isset($_POST["submit-course-details"])))
{
    echo "<script>";
    echo "alert(\"No Form Data !\");";
    echo "window.location.replace(\"../import-csv.php\")";
    echo "</script>";
}

?>