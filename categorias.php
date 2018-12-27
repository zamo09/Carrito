<?php
session_start();
include "php/conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Categorias de prodcutos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php include("modulos/head.php"); ?>
	<br><br>
	<div class="container">
		<div class="row h-100">  
			<div class="col-sm-12 my-auto">  
				<div class="row justify-content-center">
					<div class="col-lg-2 col-md-4 col-xs-6">
						<a href="./cafe.php"><img class='d-block mb-4 h-100 img-fluid img-thumbnail image-responsive imagen' style='border:none !important' width='100' height='100' src='img/iconos/cafe.png'></a>  <!-- ver el carrito de compra  -->
					</div>	
					<div class="col-lg-2 col-md-4 col-xs-6">			
						<a href="./licores.php"><img class='d-block mb-4 h-100 img-fluid img-thumbnail image-responsive imagen' style='border:none !important' width='100' height='100' src='img/iconos/vino.png'></a></a>  <!-- ver el carrito de compra  -->
					</div>
					<div class="col-lg-2 col-md-4 col-xs-6">			
						<a href="./dulces.php"><img class='d-block mb-4 h-100 img-fluid img-thumbnail image-responsive imagen' style='border:none !important' width='100' height='100' src='img/iconos/donas.png'></a></a>  <!-- ver el carrito de compra  -->
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-2 col-md-4 col-xs-6">
						<a href="./cafe.php"><img class='d-block mb-4 h-100 img-fluid img-thumbnail image-responsive imagen' style='border:none !important' width='100' height='100' src='img/iconos/alimentos-enlatados.png'></a>  <!-- ver el carrito de compra  -->
					</div>	
					<div class="col-lg-2 col-md-4 col-xs-6">			
						<a href="./abarrotes.php"><img class='d-block mb-4 h-100 img-fluid img-thumbnail image-responsive imagen' style='border:none !important' width='100' height='100' src='img/iconos/abarrotes.png'></a></a>  <!-- ver el carrito de compra  -->
					</div>
					<div class="col-lg-2 col-md-4 col-xs-6">			
						<a href="./products.php"><img class='d-block mb-4 h-100 img-fluid img-thumbnail image-responsive imagen' style='border:none !important' width='100' height='100' src='img/iconos/bolsillo.png'></a></a>  <!-- ver el carrito de compra  -->
					</div>
				</div>
			</div>
		</div>
	</div>
		
	</div>
	<?php include("modulos/footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<style type="text/css">

</style>
</body>
</html>