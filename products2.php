<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "php/conection.php";
$q = true;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de productos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>PContenedores</h1>
			<!-- <a href="./cart.php" class="btn btn-warning">Ver Carrito</a>  -->
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$products = $con->query("select * from Producto where id_categoria = 2");
?>
<table class="table table-bordered">
<thead>
	<th>Producto</th>
	<th>Precio</th>
	<th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
while($r=$products->fetch_object()):?>
<tr>
	<td><?php echo $r->nombre;?></td>
	<td>$ <?php echo $r->precio; ?></td>
	<td style="width:260px;">
	<?php
	$found = false;

	if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id_producto){ $found=true; break; }}}
	?>
	<?php if($found):$q = false;?>
		<a href="php/delfromcart.php?categoria=1&id=<?php echo $c["product_id"];?>" class="btn btn-danger">Eliminar</a>
		<form class="form-inline" method="post" action="./php/addtocart.php">
	<input type="hidden" name="product_id" value="<?php echo $r->id_producto; ?>">

	<?php else:?>
		<?php if($_SESSION["contenedor"][0] == "0"):?>
		
		<form class="form-inline" method="post" action="./php/addtocart.php">
	<input type="hidden" name="product_id" value="<?php echo $r->id_producto; ?>">
	  <div class="form-group">
	    <input type="hidden" name="q" value="1" >
	    <input type="hidden" name="cate" value="1" >
	  </div>
	  <button type="submit" class="btn btn-primary">Agregar al carrito</button>
	</form>
	<?php else:?>
<a href="#" class="btn btn-warning">Prodcuto no seleccionado</a>
		
	<?php endif; ?>
	<?php endif; ?>
	</td>
</tr>
<?php endwhile;?>
</table>
<br><br><hr>

		</div>
	</div>
</div>
</body>
</html>
