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
	$username = $_POST['username'];
	$passwordU = $_POST['password'];
	$query = 'Select * from Usuario where user_id = "'.$username.'" and password = "'.$passwordU.'"';
	$boolofq = mysql_query($query);
	$count = mysql_num_rows($boolofq);
	if($count == 0){
		echo "voy a login fail";
		header("location: loginfail.html");
	}
	else{
		echo "else";
		$resultofq = mysql_fetch_array($boolofq);
		if(!$resultofq['isAdmin']){
			echo "no soy admin";
			header('location: profile.php?user='.$username);
		}
		else{
			echo "soy admin";
			header("location: search-bar.php?user=".$username);
		}
	}
?>
