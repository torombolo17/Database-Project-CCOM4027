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

	$query = 'select * from Produjo where id_producto ="'.$prod.'"';
	$boolofq = mysql_query($query);
	$resultofq = mysql_fetch_array($boolofq);

	$query2 = 'select nombre from Usuario where user_id ="'.$resultofq['user_id'].'"';
	$boolofq2 = mysql_query($query2);
	$resultofq2 = mysql_fetch_array($boolofq2);

?>
<html>
	<head>
		<title>IINAS Research</title>
		<link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.css">
	</head>

	<body>
<!-- fixed top nav bar -->
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
						<a class="navbar-brand" href=<?php echo "home2.php?user=".$username ?> >Home</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href=<?php echo "search-bar.php?user=".$username ?>>Search</a>
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
			<div class="container" style="padding-bottom:20px">
				<h1>Product</h1>
			</div>
	<!-- end fixed top nav bar -->
	</div>

	<div class="container">
	<div class="row">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-body">
		<h3><?php echo $resultofq['nombre_prod']; ?></h3>
		<ul style="list-style:none">
			<li><h4 style="display: inline">Date of Publication: </h4> <?php echo $resultofq['fecha']; ?> </li><br />
			<li><h4 style="display: inline">Type of Publication: </h4> <?php echo $resultofq['tipo']; ?> </li><br />
			<li><h4 style="display: inline">Student: </h4><?php echo "<a href=publicprofile2.php?user=".$username.'&theguy='.$resultofq['user_id'].'>'.$resultofq2['nombre'].'</a>' ?> </li><br />
		</ul>
	</div>
	</div>
	</div>
	</div>
	</div>

	</body>

</html>
