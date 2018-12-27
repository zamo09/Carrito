<?php
$nombre = $_POST['nombre'];
$id_prducto = $_POST['codigo'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$canMax = $_POST['cantidadMax'];
$canMin = $_POST['cantidadMin'];
$cantidad = $_POST['cantidad'];

$Imagen = $_FILES['imagen']['name'];
$nombrer = strtolower($Imagen);
$cd=$_FILES['imagen']['tmp_name'];
$ruta = "img/" . $_FILES['imagen']['name'];
$destino = "../img";
$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"],("../" . $ruta));
include("coneccion.php");
		$conexion = mysql_connect($servidor,$usuario,$contraseña);
					mysql_select_db($BD, $conexion);
		$sql_prodcuto = "INSERT INTO Producto (id_producto,nombre,precio,id_categoria,cantidad_max,cantidad_min,cantidad_rea,activo,ruta) VALUES (" . $id_prducto . ",'" . $nombre . "'," . $precio . "," . $categoria . "," . $canMax . "," . $canMin . "," . $cantidad . ",1,'".$ruta."');";
		$result = mysql_query($sql_prodcuto);
		if ($result){
			echo "<script>
               			alert('Producto Guardado con Exito');
						window.location= '../newproduct.php'
    				</script>";
		}else{
			echo "<script>
               			alert('Error al guardar el producto');
               			window.history.back();
    				</script>";
		}
	?>