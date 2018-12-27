<?php 
$nombre = $_POST['nombre'];
$temporada = $_POST['temporada'];
include("coneccion.php");
		$conexion = mysql_connect($servidor,$usuario,$contraseña);
					mysql_select_db($BD, $conexion);
		$sql_prodcuto = "INSERT INTO Categoria (nombre,activo,temporada) VALUES ('" . $nombre . "',1,'" . $temporada . "');";
		$result = mysql_query($sql_prodcuto);
		if ($result){
			echo "<script>
               			alert('Categoria Guardada con Exito');
               			window.location= '../newcategory.php'
    				</script>";
		}else{
			echo "<script>
               			alert('Error al guardar la categoria');
               			window.history.back();
    				</script>";
		}

?>
?>