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
	$query = 'Select * from Usuario natural join Estudiante where user_id = "'.$username.'"';
	$boolofq = mysql_query($query);
	$resultofq = mysql_fetch_array($boolofq);

	$query2 = 'Select titulo, id_innas from InvestigacionInnas where id_innas in (select id_innas from Investigo where user_id = "'.$username.'")';
	$boolofq2 = mysql_query($query2);
	$resultofq2 = mysql_fetch_array($boolofq2);
	$countinve = mysql_num_rows($boolofq2);
	if($countinve == 0){
		$flaginve = false;
	}
	else{
		$flaginve = true;
	}

	$query3 = 'Select nombre_prod, id_producto from Produjo where user_id = "'.$username.'"';
	$boolofq3 = mysql_query($query3);
	$resultofq3 = mysql_fetch_array($boolofq3);
	$countprod = mysql_num_rows($boolofq3);
	if($countprod == 0){
		$flagprod = false;
	}
	else{
		$flagprod = true;
	}

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
	<!-- end fixed top nav bar -->
	</div>
	<div class="container" style="padding-bottom:20px">
		<ul class="nav nav-tabs offset2 span5">
			<li class="active"><a href=<?php echo "profile.php?user=".$username ?>>Profile</a></li>
			<li><a href= <?php echo "edit_timeline.php?user=".$username ?>>Add to Timeline</a></li>
			<li><a href= <?php echo "addproduct.php?user=".$username ?>>Add a Product</a></li>
			<li><a href= <?php echo "signup.php?user=".$username ?>>Edit Profile</a></li>
		</ul>
	</div>
	
	<div class="container">
	<div class="row">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-body">
		<h3><?php echo $resultofq['nombre'] ?></h3>
		<ul style="list-style:none">
			<li><h4 style="display: inline">email: </h4> <?php echo $resultofq['email'] ?> </li><br />
			<li><h4 style="display: inline">Faculty: </h4> <?php echo $resultofq['facultad'] ?> </li><br />
			<li><h4 style="display: inline">Department: </h4> <?php echo $resultofq['dept'] ?> </li><br />
			<li><h4 style="display: inline">Job: </h4> <?php echo $resultofq['trayectoria'] ?> </li><br />
		</ul>
	</div>
	</div>
	</div>


  
  <div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<h3>Timeline</h3>
			<?php
				if(!$flaginve){
					echo "No research yet.";
				}
				else{
					echo "<a href= research.php?user=".$username."&inve=".$resultofq2['id_innas'].">".$resultofq2['titulo']."</a>";
					echo "<br />";
					while($resultofq2 = mysql_fetch_array($boolofq2)){
						echo "<a href= research.php?user=".$username."&inve=".$resultofq2['id_innas'].">".$resultofq2['titulo']."</a>";
						echo "<br />";
					}
				}
			?>
		</div>
	</div>
  </div>
  </div>
  </div>

	<div class="container">
	<div class="row">
	<div class="col-md-6">
	<div class="panel panel-default">
	<div class="panel-body">
		<h3>Products</h3>
		<?php
			if(!$flagprod){
				echo "No products yet.";
			}
			else{
				echo "<a href= product.php?user=".$username."&prod=".$resultofq3['id_producto'].">".$resultofq3['nombre_prod']."</a>";
				echo "<br />";
				while($resultofq3 = mysql_fetch_array($boolofq3)){
					echo "<a href= product.php?user=".$username."&prod=".$resultofq3['id_producto'].">".$resultofq3['nombre_prod']."</a>";
					echo "<br />";
				}
			}
		?>
	</div>
	</div>
	</div>

	</body>

</html>
