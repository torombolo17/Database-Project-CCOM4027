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
	$newuser = $_POST['username'];

	$query = 'select id_innas from Investigo where user_id = "'.$newuser.'"';
	$boolofq = mysql_query($query);

	$query3 = 'delete from Investigo where user_id ="'.$newuser.'"';
	$boolofq3 = mysql_query($query3);

	while($resultofq = mysql_fetch_array($boolofq)){
		$idiinas = $resultofq['id_innas'];
		$query2 = 'delete from InvestigacionInnas where id_innas ='.$idiinas;
		$boolofq2 = mysql_query($query2);
		echo $query2;
	}

	$query4 = 'delete from Produjo where user_id ="'.$newuser.'"';
	$boolofq4 = mysql_query($query4);

	$query5 = 'delete from Estudiante where user_id ="'.$newuser.'"';
	$boolofq5 = mysql_query($query5);

	$query6 = 'delete from Usuario where user_id ="'.$newuser.'"';
	$boolofq6 = mysql_query($query6);
	
	header("location: search-bar.php?user=".$username);

?>