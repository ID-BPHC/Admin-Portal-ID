<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location: login.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/LoggedIn-Template.dwt" codeOutsideHTMLIsLocked="true" -->
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Mid Semester Feedback Control</title>
<link href="css/mid-sem-fb-config.css" rel="stylesheet" type="text/css">
<!-- InstanceEndEditable -->
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- InstanceBeginEditable name="head" -->
<link rel="stylesheet" href="css/datepicker.css">
<!-- InstanceEndEditable -->
</head>

<body style="padding-top: 50px">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topFixedNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="index.php">Instruction Division</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="topFixedNavbar1">
      <ul class="nav navbar-nav">
        <li><a href="import-csv.php">Import CSV<span class="sr-only">(current)</span></a></li>
        
        <li><a href="mid-sem-feedback-config.php">Open/Close Mid Sem Feedback</a></li>
        
        <li><a href="project-allotment.php">Project Allotment</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View Feedbacks<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="mid-sem-feedback-view.php">Mid Sem Feedbacks</a></li>
            <li><a href="24x7-feedback-view.php">24x7 Feedbacks</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<div class="container-fluid">
  <div class="row" id="hero"> <img src="images/Logo.png" alt="Placeholder image" class="img-responsive" id="herologo">
    <h1 id="heroheading">Administration Portal</h1>
    <img src="images/hero_img.jpeg" alt="Placeholder image" class="img-responsive" id="heroimg"></div>
<div class="row">
    <div class="col-md-12 col-lg-10 col-lg-offset-1"><!-- InstanceBeginEditable name="EditRegion3" -->
      <div class="row">
        <div class="col-md-12">
          <h1>Mid Semester Feedback Control</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
          <?php require_once(__DIR__ . "/controllers/mid-sem-fb-toggle-controller.php") ?>
        </div>
      </div>
    <!-- InstanceEndEditable --></div>
  </div>
  <div class="row" id="foot-div">
    <footer>Instruction Division - BITS Pilani Hyderabad Campus</footer>
</div>
</div>
<!-- /.container-fluid --><!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> <script src="js/jquery-3.2.1.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
<!-- InstanceBeginEditable name="js" -->
<script type="text/javascript" src="js/datepicker.js"></script>
<script type="text/javascript" src="js/midsem-fb-config.js"></script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>