<?php
	$host = "localhost";
	$usuariobd = "jdelavega";
	$password = "j.r.delavega17@gmail.com";
	$database = "inas_estudiantes";
	$coneccion = mysql_connect($host, $usuariobd, $password);
	$tableName = "Usuario";
	//check if you are connected.
	if($coneccion){
		echo "Connection made.\n";
	}
	else{
		echo "Error connecting.\n";
	}
	$use_DB = mysql_select_db($database);
	$username = $_POST['user'];
	$product = $_POST['product'];
	$datepub = $_POST['datepub'];
	$typeprod= $_POST['typeprod'];

	$query = 'Insert into Produjo(fecha, nombre_prod, user_id, tipo) values("'.$datepub.'","'.$product.'","'.$username.'","'.$typeprod.'")';
	$boolofq = mysql_query($query);

	header("location: profile.php?user=".$username);
?>