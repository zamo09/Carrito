<?php 
$id_producto = $_GET['id'];
	include("coneccion.php");
	$conexion = mysql_connect($servidor,$usuario,$contraseña);
				mysql_select_db($BD,$conexion);
	$up_dept = "UPDATE producto SET activo = 0 WHERE id_producto = " . $id_producto . ";";
		$result_up_dept = mysql_query($up_dept);
	if($result_up_dept){
		echo "<script type=''>
alert('funcionando');</script>"; 
		header("Location: ../listadeproductos.php");
	}else{
		echo "no se pudo cerrar.";
		echo $up_dept;
	}
?>