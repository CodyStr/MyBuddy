<?php
	session_start();
	$_SESSION['login'] = false;
	require 'dbconfig/config.php';
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
	  <div class="container">
		<div class="col-lg-4">
		  <div class="jumbotron">
			  <div class="text-center">
			  	<h1>MyBuddy!</h1>
			  </div>
			<form class="myform" action="login.php" method="post">
			  <div class="form-group">
				<input name="username" type="text" class="form-control" placeholder="Gebruikersnaam">
			  </div>
			  <div class="form-group">
				<input name="password" type="password" class="form-control" placeholder="Wachtwoord">
			  </div>
				<?php
					if(isset($_POST['login']))
					{
						$username = $_POST['username'];
						$password = $_POST['password'];

						$query= $conn->prepare("SELECT username FROM Users WHERE username =:username AND password =:password");
						$query->bindValue('username', $username);
						$query->bindValue('password', $password);
						$query->execute();
					
						if ($row = $query->fetch(PDO::FETCH_ASSOC)) 
						{
							$_SESSION['username'] = $username;
							$_SESSION['login'] = true;
							header('Location: index.php');
						}
						else{
							echo '<div class="alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Fout melding!</strong> De gebruikersnaam of wachtwoord is fout ingevuld.
									</div>';
						}
					}
				?>
				<input name="login" type="submit" id="login_btn" class="btn btn-primary form-control" value="Login"/>
			</form>
		  </div>
		</div>
		<div class="col-lg-4"></div>
	  </div>
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>