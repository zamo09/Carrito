<?php 
	include("php/coneccion.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Añadir prodcuto</title>
 	<meta  content="text/html;" http-equiv="content-type" charset="utf-8">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css">
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
 </body>
 </head>
 <body>
	 <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="container col-lg-6" style="margin-top: 5em">  
					<h1>Añadir Producto</h1>
			        <!-- form start -->
			        <form role="form" id="register-form" autocomplete="off" method="post" action="php/addcategoria.php">                
						<div class="form-group">
                			<div class="input-group">
                				<div class="input-group-text">
                   					<span class="fa fa-font"></span>
                   				</div> 
               					<input name="nombre" type="text" class="form-control" placeholder="Nombre del producto" required>
               				</div>
               				<span class="help-block" id="error"></span>
          				</div>                               
	                    <div class="form-group">
	                        <div class="input-group">
		                        <div class="input-group-text">
		                        	<span class="fa fa-book"></span>
		                        </div>
		                       	<select class="custom-select" name="temporada" required>
		                       		<option value="">Temporada</option>
		                       		<option value="N">Navideña</option>
		                       		<option value="O">Otoño</option>
							    </select>
		                    </div>  
	                        <span class="help-block" id="error"></span>                    
	                    </div>                                   				
			            <div class="row justify-content-md-center justify-content-lg-end">
			            	<input type="reset" class="btn btn-danger" value="Cancelar" style="margin-right: 10px; color: white;"></span></input>
					    	<button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Guardar</button>
					    </div>
        			</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		function numeros(e){
		    tecla = (document.all) ? e.keyCode : e.which;
		    //Tecla de retroceso para borrar, siempre la permite
		    if (tecla==8){
		        return true;
		    }		        
		    // Patron de entrada, en este caso solo acepta numeros
		    patron =/[0-9\x00]/;
		    tecla_final = String.fromCharCode(tecla);
		    return patron.test(tecla_final);
		}

		function decimales(e){
		    tecla = (document.all) ? e.keyCode : e.which;
		    //Tecla de retroceso para borrar, siempre la permite
		    if (tecla==8){
		        return true;
		    }		        
		    // Patron de entrada, en este caso solo acepta numeros
		    patron =/[0-9,.,\v ]/;
		    tecla_final = String.fromCharCode(tecla);
		    return patron.test(tecla_final);
		}
	</script>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>