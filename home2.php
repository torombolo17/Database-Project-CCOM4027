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

	$query = 'select titulo, id_innas from InvestigacionInnas';
	$boolofq = mysql_query($query);
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IINAS Research</title>

		<!-- Bootstrap -->
		<link href="bootstrap-3.1.1-dist/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
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
						<a class="navbar-brand" href= <?php echo "home2.php?user=".$username ?> >Home</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href=<?php echo "search-bar.php?user=".$username ?> >Search</a>
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
		
		<div class="container">
			<div class="row">
				<div class="col-md-9" role="main">
					<h1> IINAS Researchs </h1>
					<div>
						<ul class="media-list">
							<?php
								while($resultofq = mysql_fetch_array($boolofq)){
									echo "<li><a href=publicresearch2.php?user=".$username."&inve=".$resultofq['id_innas'].">".$resultofq['titulo']."</a></li>";
									echo "</br>";
								}
							?>
							<li>
						</ul>
					</div>
				</div>
			</div>

			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="bootstrap-3.1.1-dist/js/bootstrap.js"></script>
	</body>
</html>
