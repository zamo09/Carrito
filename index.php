<?php 
session_start();
$_SESSION["contenedor"][0]=0;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrito Basico PHP</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h1>Ejemplo de carrito de compras 2</h1>
			<p>A continuacion el menu de opciones.</p>
			<br>
				<ul>
					<li><a href="./products.php">Productos</a></li>
					<li><a href="./cart.php">Carrito</a></li>
					<li><a href="../">Zamo RH</a></li>
					<li><a href="./newproduct.php">Añadir producto</a></li>
					<li><a href="./newcategory.php">Añadir categoria</a></li>
					<li><a href="./listadeproductos.php">Lista de productos</a></li>
				</ul>
				<br><br><hr>
			</div>
		</div>
	</div>
</body>
</html>