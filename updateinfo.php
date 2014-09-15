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
	$email = $_POST['email'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	$phone = $_POST['phone'];
	$faculty = $_POST['faculty'];
	$dept = $_POST['dept'];
	$job = $_POST['job'];
	$address = $_POST['address'];

	if($pass1 != $pass2){
		header("location: signupfail.php?user=".$username);
	}
	else{
		if($email != Null){
			$query = 'update Usuario set email = "'.$email.'" where user_id = "'.$username.'"';
			$boolofq = mysql_query($query);
		}

		if($pass1 != Null){
			$query2 = 'update Usuario set password = "'.$pass1.'" where user_id = "'.$username.'"';
			$boolofq2 = mysql_query($query2);
		}

		if($phone != Null){
			$query3 = 'update Usuario set telefono = "'.$phone.'" where user_id = "'.$username.'"';
			$boolofq3 = mysql_query($query3);
		}

		if($address != Null){
			$query4 = 'update Usuario set direccion = "'.$address.'" where user_id = "'.$username.'"';
			$boolofq4 = mysql_query($query4);
		}

		if($faculty != Null){
			$query5 = 'update Estudiante set facultad = "'.$faculty.'" where user_id = "'.$username.'"';
			$boolofq5 = mysql_query($query5);
		}

		if($dept != Null){
			$query6 = 'update Estudiante set dept = "'.$dept.'" where user_id = "'.$username.'"';
			$boolofq6 = mysql_query($query6);
		}

		if($job != Null){
			$query7 = 'update Estudiante set trayectoria = "'.$job.'" where user_id = "'.$username.'"';
			$boolofq7 = mysql_query($query7);
		}

		header("location: profile.php?user=".$username);
	}

?>
