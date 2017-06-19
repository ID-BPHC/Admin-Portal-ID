<?php

session_start();
if(!isset($_SESSION['username']))
{
header("Location: ../login.php");
die();
}

require_once(__DIR__ . "/../includes/functions.php");

// Faculty List Upload

if ( isset($_POST["submit-course-details"]) ) {

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
					
					mysqli_query($con, "TRUNCATE TABLE courses_faculty");
					
                    while($row = fgetcsv($handle, 1000, ","))
                    {
                        $cID = prep($row[0]);
                        $cTitle = prep($row[1]);
                        $section = prep($row[2]);
						$name = prep($row[3]);
						$email = prep($row[4]);
                        $q = mysqli_query($con, "INSERT INTO courses_faculty(CourseID, CourseTitle, Section, Name, email) VALUES ('$cID', '$cTitle', '$section', '$name', '$email')");
                        if(!$q)
                        {
                            $msg = "ERROR : " . mysqli_error($con);
                            $success = 0;
                        }
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
else
{
    echo "<script>";
    echo "alert(\"No From Data !\");";
    echo "window.location.replace(\"../import-csv.php\")";
    echo "</script>";
}

//Course details upload

if ( isset($_POST["submit-faculty-list"]) ) {

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
					
					mysqli_query($con, "TRUNCATE TABLE faculty_email");
					
                    while($row = fgetcsv($handle, 500, ","))
                    {
                        $sno = prep($row[0]);
                        $name = prep($row[1]);
                        $email = prep($row[2]);
                        $q = mysqli_query($con, "INSERT INTO faculty_email(SNo, FacultyName, EmailID) VALUES ('$sno', '$name', '$email')");
                        if(!$q)
                        {
                            $msg = "ERROR : " . mysqli_error($con);
                            $success = 0;
                        }
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
else
{
    echo "<script>";
    echo "alert(\"No From Data !\");";
    echo "window.location.replace(\"../import-csv.php\")";
    echo "</script>";
}

?>