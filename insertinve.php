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
	$title = $_POST['invetitulo'];
	$description = $_POST['descripcion'];
	$year = $_POST['yearinve'];
	$program = $_POST['program'];

	echo $username;
	$query = 'Insert into InvestigacionInnas(titulo, description) values("'.$title.'", "'.$description.'")';
	$boolofq = mysql_query($query);

	$query2 = 'Select id_innas from InvestigacionInnas where titulo ="'.$title.'"';
	$boolofq2 = mysql_query($query2);
	$resultofq2 = mysql_fetch_array($boolofq2);
	$flagsum = "False";
	$flag = "False";
	if($program == "summer"){
		$flagsum = "True";
	}
	else{
		$flag = "True";
	}

	$query3 = 'Insert into Investigo(id_innas, year, schoolar_resident, summer, user_id) values('.$resultofq2['id_innas'].',"'.$year.'",'.$flag.','.$flagsum.',"'.$username.'")';

	echo $query3;
	$boolofq3 = mysql_query($query3);

	header("location: profile.php?user=".$username);
?>