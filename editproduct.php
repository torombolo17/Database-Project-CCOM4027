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
	$prod = $_GET['prod'];
?>
<html>
	<head>
		<title>IINAS Research</title>
		<head>
		<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.css" />
	</head>
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
								<a href = "login.html" onclick="">Sign out</a>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>

			<ul class="nav nav-tabs">
				<li>
					<a href= <?php echo "product.php?user=".$username.'&prod='.$prod ?> >Back to Product</a>
				</li>
				<li class="active">
					<a href=<?php echo "editproduct.php?user=".$username.'&prod='.$prod ?>>Edit Product</a>
				</li>
			</ul>
			<br />

			<div style="padding-left: 200px; padding-right: 200px">
				<form name = "forma" method = "post" action = "updateproduct.php" >
					<div class="input-group">
						<span class="input-group-addon">Name of the Product</span>
						<input type="text" class="form-control" placeholder="Some_name_for_product" name="product">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Date of publication</span>
						<input type="text" class="form-control" placeholder="05/29/2014" name="datepub">
					</div>
					<br />
					<div class="input-group">
						<span class="input-group-addon">Type of the product</span>
						<select id="lrd-universityName" class="form-control" name="typeprod">
							<option value="Null" title="Null"></option>
							<option value="paper" title="paper">paper</option>
							<option value="banner" title="banner">banner</option>
							<option value="software" title="software">software</option>
						</select>
					</div>
					<br />
					<div align="center">
						<input type = "hidden" name = "user" value ="<?php echo $username; ?>" >
						<input type = "hidden" name = "prod" value ="<?php echo $prod; ?>" >
						<button type="submit" class="btn btn-primary" onclick="">
							Done
						</button>
				<form/>
			</div>

		</div>

		<!------------ End of Sign Up view ------------>

	</body>
</html>
