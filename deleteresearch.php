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
	print_r($_POST);
	$username = $_POST['user'];
	$idinve = $_POST['inve'];
	$password = $_POST['pass'];

	$query3 = 'select password from Usuario where user_id="'.$username.'"';
	$boolofq3 = mysql_query($query3);
	$resultofq3 = mysql_fetch_array($boolofq3);

	if($resultofq3['password'] == $password){
		$query = 'delete from Investigo where id_innas = '.$idinve;
		$boolofq = mysql_query($query);

		$query2 = 'delete from InvestigacionInnas where id_innas = '.$idinve;
		$boolofq2 = mysql_query($query2);
		header("location: profile.php?user=".$username);
	}
	else{
		header("location: confirmdeletefailp.php?user=".$username."&prod=".$prod);
	}
	
?>