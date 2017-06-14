<?php
	session_start();
	require 'dbconfig/config.php';
	if (isset($_SESSION['login']) && $_SESSION['login'] == true):
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MyBuddy!</title>
	<link rel="stylesheet" type ="text/css" href="css/stylesheet.css">
	  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- jQuery -->
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	 
  </head>
  <body>
	  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MyBuddy! | <?php echo $_SESSION['username']?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
        	<li class="hover"><a href="index.php">Overzicht <span class="sr-only">(current)</span></a></li>
        	<li><a href="index.php?page=Add">Herinneringen inplannen</a></li>
			<li><a href="index.php?page=Recent">Actuele herinneringen</a></li>
			<li><form class="form_logout" action="login.php" method="post">
					<input name="logout_btn" type="submit" id="logout_btn" class="btn btn-primary form-control" value="Log uit"/>
				</form></li>
		</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	  	<?php
			if(!isset($_GET['page'])){
				include 'includes/overview.php';
			}
			else if($_GET['page'] == 'Add')
			{
				include 'includes/addReminder.php';
			}else if($_GET['page'] == 'Recent'){
				include 'includes/recentReminder.php';
			}
		?>
	  	<?php
			if(isset($_POST['logout_btn'])){
				session_destroy();
				header('Location: login.php');
			}
		?>
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php endif; if(!$_SESSION['login'] == true) header('Location: login.php'); ?>