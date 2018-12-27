<?php

$con  = new mysqli("localhost","zamo","1614zamo","carrito");
$con->set_charset("utf8");
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>