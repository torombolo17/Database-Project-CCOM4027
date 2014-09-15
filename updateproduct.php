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
	$prod = $_POST['prod'];
	$product = $_POST['product'];
	$datepub = $_POST['datepub'];
	$typeprod= $_POST['typeprod'];

	if($product != Null){
		$query4 = 'update Produjo set nombre_prod = "'.$product.'" where id_producto ='.$prod;
		$boolofq4 = mysql_query($query4);
		echo $query4;
	}

	if($datepub != Null){
		$query5 = 'update Produjo set fecha = "'.$datepub.'" where id_producto ='.$prod;
		$boolofq5 = mysql_query($query5);
		echo $query5;
	}

	if($typeprod != "Null"){
		$query6 = 'update Produjo set tipo = "'.$typeprod.'" where id_producto ='.$prod;
		$boolofq6 = mysql_query($query6);
		echo $query6;
	}
	header("location: product.php?user=".$username.'&prod='.$prod);
?>