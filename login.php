<?php
session_start();
if(isset($_SESSION['username']))
{
	header("Location: index.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet" type="text/css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  </head>
  <body>
	<div class="container-fluid" id="main">
      <div class="row">
        <div class="col-md-12"><img src="images/bits-banner.png" alt="Placeholder image" class="img-responsive" id="banner">
          <h1>Administration Portal</h1>
</div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-offset-2 col-xs-8" id="login-column">
          <h3>Login</h3><br>
          <h4>
          	<?php
			if(isset($_GET['fail']))
			{
				echo "Invalid Credentials !";
			}
			?>
          </h4>
          <form action="controllers/login-controller.php" method="post" name="form1" id="login-form">
            <div class="credentials form-group"><label for="username">Username :</label>
            <input type="text" name="username" id="username" class="form-control"></div>
            <br>
            <div class="credentials form-group"><label for="password">Password :</label>
            <input type="password" name="password" id="password" class="form-control"></div>
            <br>
            <button type="submit" class="btn btn-warning" id="submit" name="submit">Login</button>
          </form>
</div>
</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-1.11.3.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed --> 
	<script src="js/bootstrap.js"></script>
  </body>
</html>