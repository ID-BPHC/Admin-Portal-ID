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
<title>Template</title>
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
        <li><a href="project-allotment.php">Project Allotment</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Feedbacks<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="import-csv.php">Import Faculty/Course Details<span class="sr-only">(current)</span></a></li>
            <li><a href="mid-sem-feedback-config.php">Toggle Mid Sem Feedback</a></li>
            <li><a href="24x7-feedback-toggle.php">Toggle 24x7 Feedback</a></li>
            <li class="divider"></li>
            <li><a href="mid-sem-feedback-view.php">View Mid Sem Feedbacks</a></li>
            <li><a href="24x7-feedback-view.php">View 24x7 Feedbacks</a></li>
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
      <h1>Heading</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet doloremque cum maxime architecto veritatis id omnis magni dignissimos sint eius, ea, iure praesentium aspernatur error incidunt, quos harum blanditiis quo.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit quidem possimus molestiae rerum incidunt iste, consequatur laborum ullam accusantium cumque in, voluptas porro autem repudiandae ipsum, officiis fugiat debitis voluptatem.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa quaerat, quo unde quod eos delectus cupiditate eligendi quia iusto repudiandae corporis dignissimos optio! Numquam dicta vero, corporis quis, recusandae doloribus?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat enim suscipit, ullam minus. Sapiente qui quas, cupiditate quo quos libero quidem? Nobis, earum, laudantium minus incidunt natus expedita placeat non.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque optio veritatis quam iure rem culpa sequi beatae natus ab dolorum, temporibus, alias in nemo vel quaerat aut ullam quas officiis.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, quisquam consequatur esse quasi perspiciatis inventore velit saepe dolore hic aliquid tempora nisi sunt deleniti, iusto itaque dicta omnis earum. Accusamus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta sunt facere praesentium corporis odio vitae ab fugiat ut, earum nisi, natus, error incidunt cupiditate fugit minima quae doloribus repudiandae obcaecati.</p>
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
<!--Edit me for js-->
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>