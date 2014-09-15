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
						<a class="navbar-brand" href= <?php echo "home.php?user=".$username ?> >Home</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href= <?php echo "profile.php?user=".$username ?> >Profile</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="login.html" onclick="">Sign out</a>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>

			<ul class="nav nav-tabs">
				<li>
					<a href=<?php echo "profile.php?user=".$username ?>>Back to Profile</a>
				</li>
				<li class="active">
					<a href="#">Edit Profile</a>
				</li>
			</ul>
			<br />

			<div style="padding-left: 200px; padding-right: 200px">
				<form name = "forma" method = "post" action = "updateinfo.php" >
					<div class="input-group">
						<span class="input-group-addon">Email*</span>
						<input type="text" class="form-control" placeholder="Some_email" name="email">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Password*</span>
						<input type="password" class="form-control" name="pass1">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Re-type Password*</span>
						<input type="password" class="form-control" name="pass2">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Phone Number</span>
						<input type="text" class="form-control" placeholder="Some_phone_number" name="phone">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Faculty*</span>
						<select id="lrd-department" class="form-control" name="faculty">
							<option value="Natural Sciences" title="Natural Sciences">Natural Sciences</option>
							<option value="Education" title="Education">Education</option>
							<option value="Arquitecture" title="Arquitecture">Arquitecture</option>
							<option value="Buissness Administration" title="Buissness Administration">Buissness Administration</option>
							<option value="Social Sciences" title="Social Sciences">Social Sciences</option>
							<option value="Humanities" title="Humanities">Humanities</option>
							<option value="General Studies" title="General Studies">General Studies</option>
						</select>
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Department*</span>
						<input type="text" class="form-control" placeholder="Some_department" name="dept">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Current Job</span>
						<input type="text" class="form-control" placeholder="Some_department" name="job">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Address</span>
						<input type="text" class="form-control" placeholder="Some_department" name="address">
					</div>
					<br />
					<div align="center">
						<input type = "hidden" name = "user" value ="<?php echo $username; ?>" >
						<button type="submit" class="btn btn-primary" onclick="">
							Done
						</button>
				<form/>
			</div>

		</div>

		<!------------ End of Sign Up view ------------>

	</body>
</html>
