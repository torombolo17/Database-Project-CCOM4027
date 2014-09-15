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
	$idinve = $_POST['inve'];
	print_r($_POST);
	$title = $_POST['invetitulo'];
	$description = $_POST['descripcion'];
	$year = $_POST['yearinve'];
	$program = $_POST['program'];
	$product = $_POST['product'];
	$datepub = $_POST['datepub'];
	$typeprod= $_POST['typeprod'];

	$flagsum = "False";
	$flag = "False";
	if($program == "summer"){
		$flagsum = "True";
	}
	else{
		$flag = "True";
	}

	if($title != Null){
		$query = 'update InvestigacionInnas set titulo = "'.$title.'" where id_innas = '.$idinve;
		$boolofq = mysql_query($query);
		echo $query;
	}

	if($description != Null){
		$query7 = 'update InvestigacionInnas set description = "'.$description.'" where id_innas = '.$idinve;
		$boolofq7 = mysql_query($query7);
		echo $query7;
	}

	if($year != Null){
		$query2 = 'update Investigo set year = "'.$year.'" where id_innas = '.$idinve;
		$boolofq2 = mysql_query($query2);
	}

	if($program != "Null"){
		$query3 = 'update Investigo set summer = '.$flagsum.' where id_innas = '.$idinve;
		$boolofq3 = mysql_query($query3);
		$query3b = 'update Investigo set schoolar_resident = '.$flag.' where id_innas = '.$idinve;
		$boolofq3b = mysql_query($query3b);
	}

	header("location: research.php?user=".$username."&inve=".$idinve);
?>