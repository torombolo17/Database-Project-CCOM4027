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
	$pass = $_POST['password'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$sex = $_POST['sex'];

	$query = 'Insert into Usuario(user_id, password, email, nombre) values("'.$newuser.'", "'.$pass.'", "'.$email.'", "'.$name.'")';
	$boolofq = mysql_query($query);

	$query2 = 'Insert into Estudiante(user_id, sexo) values("'.$newuser.'", "'.$sex.'")';
	$boolofq2 = mysql_query($query2);

	header("location: search-bar.php?user=".$username);

?>