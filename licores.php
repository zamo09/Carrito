<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "php/conection.php";
if($_SESSION["contenedor"][0] == "0"){
	echo "<script>
         alert('Por Favor selecciona un contenedor primero');
		 window.location= 'products.php'
    	</script>";	
}
?>
<!DOCTYPE html>
<html>
<head> 
	<title>Vinos y licores</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<!-- Navigation -->
	<?php include("modulos/head.php"); ?>

			<!-- <a href="./cart.php" class="btn btn-warning">Ver Carrito</a>  ver el carrito de compra  -->
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>Productos</h1>
			<h1>Vinos y licores</h1>
		</div>		
		
	</div>	
<div class="row text-center text-lg-center align-items-end">
	<?php

	/*
	* Esta es la consula para obtener todos los productos de la base de datos.
	*/
	$products = $con->query("select * from Producto where id_categoria = 3"); 
		/*
		* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
		*/

	while($r=$products->fetch_object()){

			?>
				<div class="col-lg-3 col-md-4 col-xs-6">
					<div class="row justify-content-center">
					<?php 
					if ($r->ruta == "") {?>
						<a href="#" class="d-block mb-4 h-100">
							<img  class='img-fluid img-thumbnail' style='border:none !important' width='250' height='250' src='img/no.png'>
						</a>
					<?php
					}else{
						?>
						<a href="#" class="d-block mb-4 h-100">
							<?php
							echo "<img  class='' title='$" . $r->precio . "' style='border:none !important' width='250' height='250' src='" . $r->ruta . "'>	";
							?>				
						</a>
					<?php
					}
					?>			
					</div>	
					
						<div class="row justify-content-center lign-items-start" style=" margin-top: -15px;">	
							
								<h6><?php echo $r->nombre;?></h6>
								
								<!-- <h6><?php  echo " $" . $r->precio;?></h6> -->
							
						</div>
						<div class="row justify-content-center">	
						<div class="col-lg-7 col-md-9 col-sm-5"   style="margin-bottom: 15px;">						
						<?php
							$found = false;
							if(isset($_SESSION["cart"])){ foreach ($_SESSION["cart"] as $c) { if($c["product_id"]==$r->id_producto){ $found=true; break; }}}
								if($found):?>
									<a href="php/delfromcart.php?categoria=5&id=<?php echo $c["product_id"];?>" class="btn btn-danger">Eliminar</a>
								<?php else:?>
											<form class="form-inline" method="post" action="./php/addtocart.php">
												<input type="hidden" name="product_id" value="<?php echo $r->id_producto; ?>">
												  <div class="form-group">
												  	<input type="hidden" name="q" value="1" >
												    <input type="hidden" name="cate" value="5" >
												  </div>
												  <button type="submit" class="btn btn-primary btn-block">Agregar</button>
												  
											</form>	
								<?php endif; ?>
						</div>
					</div>	
				</div>


		
			<?php } ?>
	<div id="mimodal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	      <span class="glyphicon glyphicon-ban-circle cerrar" data-dismiss="modal"></span>
	      <img src="" class="modal-content recibir-imagen" width="100%" height="100%">
	      <div class="modal-footer">
	      	<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
	        			<h1 class="texto-imagen"></h1>
	        		</div>
	        	</div>
	        </div>
	      </div>
	  </div>
	</div>
</div>
</div>
<?php include("modulos/footer.php"); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">

  $(function(){

    $('.imagen').click(function(){
        var imagen1=$(this).attr('src');
        var titleimagen=$(this).attr('title');

        if (imagen1==""){

          $('.recibir-imagen').attr('src','http://www.51allout.co.uk/wp-content/uploads/2012/02/Image-not-found.gif');
          $('#mimodal').modal();

        }else{
	        $('.recibir-imagen').attr('src',imagen1);
	        $('.texto-imagen').text(titleimagen);
	        $('#mimodal').modal();
      }
    });

  });

</script>

 
</body>
</html>