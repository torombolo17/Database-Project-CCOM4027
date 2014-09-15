<?php
	$host = "localhost";
	$usuariobd = "jdelavega";
	$password = "j.r.delavega17@gmail.com";
	$database = "inas_estudiantes";
	$coneccion = mysql_connect($host, $usuariobd, $password);
	$tableName = "Usuario";
	//check if you are connected.
	if(!$coneccion){
		echo "Connection failed.\n";
	}
	$use_DB = mysql_select_db($database);
	$username = $_GET['user'];
	$idinve=$_GET['inve'];
?>
<html>
	<head>
		<title>IINAS Research</title>
		<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.css" />
	</head>

	<body>

		<!------------ Sign Up view ------------>

		<div id="lrd-login">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href=<?php echo "home.php?user=".$username ?> >Home</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href=<?php echo "profile.php?user=".$username ?> >Profile</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href = "login.html" onclick="">Sign out</a>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			<br />

			<div style="padding-left: 200px; padding-right: 200px">
			<form name = "forma" method = "post" action = "deleteresearch.php" >
				<div class="input-group">
					<span class="input-group-addon">To delete the research please enter you password</span>
					<input type="password" class="form-control" placeholder="Some_user" name="pass">
				</div>
				</br>
				<div align="center">
					<input type = "hidden" name = "user" value ="<?php echo $username; ?>" >
					<input type = "hidden" name = "inve" value ="<?php echo $idinve; ?>" >
					<button type="submit" class="btn btn-primary" onclick="">
						Done
					</button>
			</form>
			</div>

		</div>

		<!------------ End of Sign Up view ------------>

	</body>
</html>