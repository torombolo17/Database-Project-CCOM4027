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
	$idinve = $_GET['inve'];

	$query = 'select * from InvestigacionInnas natural join Investigo where id_innas ='.$idinve;
	$boolofq = mysql_query($query);
	$resultofq = mysql_fetch_array($boolofq);

	$query2 = 'select nombre from Usuario natural join Estudiante natural join Investigo where id_innas='.$idinve;
	$boolofq2 = mysql_query($query2);
	$resultofq2 = mysql_fetch_array($boolofq2);

	$query3 = 'select titulo from InvestigacionInnas where id_innas='.$idinve;
	$boolofq3 = mysql_query($query3);
	$resultofq3 = mysql_fetch_array($boolofq3);

	
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
						<a class="navbar-brand" href=<?php echo "home.php?user=".$username ?> >Home</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href=<?php echo "profile.php?user=".$username ?>>Profile</a>
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
				<h1>Research</h1>
			</div>
	<!-- end fixed top nav bar -->
	</div>
	<div class="container" style="padding-bottom:20px">
		<ul class="nav nav-tabs offset2 span5">
			<li class="active"><a href=<?php echo "research.php?user=".$username."&inve=".$idinve ?>>Reserach</a></li>
			<li><a href= <?php echo "editinve.php?user=".$username."&inve=".$idinve ?>>Edit Research</a></li>
			<li><a href= <?php echo "confirmdelete.php?user=".$username."&inve=".$idinve ?>>Delete Research</a></li>
		</ul>
	</div>
	
	<div class="container">
	<div class="row">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-body">
		<h3><?php echo $resultofq3['titulo'] ?></h3>
		<ul style="list-style:none">
			<li><h4 style="display: inline">Year: </h4> <?php echo $resultofq['year']; ?> </li><br />
			<li><h4 style="display: inline">Program: </h4> <?php if($resultofq['summer'] == 1){
																	echo "Summer Program";
																 }
																 else{
																 	echo "Schoolar Resident";
																 }
															?> </li><br />
			<li><h4 style="display: inline">Student: </h4> <?php echo $resultofq2['nombre'] ?> </li><br />
		</ul>
	</div>
	</div>
	</div>
	<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Description:</h3>
			<p><?php echo $resultofq['description']?></p>
		</div>
	</div>
  </div>
	</div>
	</div>

	</body>

</html>
