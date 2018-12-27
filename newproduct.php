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
			        <form role="form" id="register-form" autocomplete="off" method="post" action="php/addproducto.php" enctype="multipart/form-data">     
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
               					<span class="fa fa-barcode "></span>
               				</div>
               					<input name="codigo" type="text" class="form-control" placeholder="Codigo de barras" onkeypress="return numeros(event)" required>
               				</div> 
               				<span class="help-block" id="error"></span>                     
          				</div>
          				<div class="row">                        
               				<div class="form-group col-md-6">
                   				<div class="input-group">
                   					<div class="input-group-text">
                   						<span class="fa fa-money-bill-alt"></span>
                   					</div>                   					
                    				<input name="precio" id="precio" type="text" class="form-control" placeholder="Precio" onkeypress="return decimales(event)" required>
                    			</div>  
                    			<span class="help-block" id="error"></span>                    
               				</div>        
		                    <div class="form-group col-md-6">
		                        <div class="input-group">
			                        <div class="input-group-text">
			                        	<span class="fa fa-book"></span>
			                        </div>
			                       	<select title="Colors" class="custom-select" name="categoria" required>
			                       		<option value="">Categoria</option>
									    <?php 											
											$conexion = mysql_connect($servidor,$usuario,$contraseña);
														mysql_select_db($BD,$conexion);
											$sql_categorias = "SELECT id_categoria, nombre FROM categoria WHERE activo = 1;";
											$result = mysql_query($sql_categorias,$conexion);
											while ($fila = mysql_fetch_array($result)){
												echo '<option value="' . $fila["id_categoria"] . '">' . $fila["nombre"] . '</option>' ;
											}
										?>	
								    </select>
			                    </div>  
		                        <span class="help-block" id="error"></span>                    
		                    </div>                            
         				</div>   
         				<div class="row">                        
               				<div class="form-group col-md-6">
                   				<div class="input-group">
                   					<div class="input-group-text">
                   						<span class="fa fa-sort-numeric-up"></span>
                   					</div>                   					
                    				<input name="cantidadMax" id="CantidadMax" type="text" class="form-control" placeholder="Cantidad Maxima" onkeypress="return numeros(event)" required>
                    			</div>  
                    			<span class="help-block" id="error"></span>                    
               				</div>     
               				<div class="form-group col-md-6">
                   				<div class="input-group">
                   					<div class="input-group-text">
                   						<span class="fa fa-sort-numeric-down "></span>
                   					</div>                   					
                    				<input name="cantidadMin" id="CantidadMin" type="text" class="form-control" placeholder="Cantidad Minima" onkeypress="return numeros(event)" required>
                    			</div>  
                    			<span class="help-block" id="error"></span>                    
               				</div>
               			</div> 
               			<div class="form-group">
               				<div class="input-group">
               				<div class="input-group-text">
               					<span class="fa fa-archive"></span>
               				</div>
               					<input name="cantidad" type="text" class="form-control" placeholder="Cantidad Ingresada" onkeypress="return numeros(event)" required>
               				</div> 
               				<span class="help-block" id="error"></span>                     
          				</div> 
						<input type="file" id="imagen" name="imagen"  accept="image/x-png,image/gif,image/jpeg"/>
						<br /><br>
						<div id="centrador" class="container col-md-3">
							<output id="list" class=""></output>
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
		    patron =/[0-9,.,\x00]/;
		    tecla_final = String.fromCharCode(tecla);
		    return patron.test(tecla_final);
		}

		function archivo(evt) {
	      var files = evt.target.files; // FileList object	       
	        //Obtenemos la imagen del campo "file". 
	      for (var i = 0, f; f = files[i]; i++) {         
	           //Solo admitimos imágenes.
	           if (!f.type.match('image.*')) {
	                continue;
	           }	       
	           var reader = new FileReader();	           
	           reader.onload = (function(theFile) {
	               return function(e) {
	               // Creamos la imagen.
	                document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '" style="width: 10em; height: 10em;" id="imagen"/>'].join('');
	               };
	           })(f);	 
	           reader.readAsDataURL(f);
	       }
		}             
      	document.getElementById('imagen').addEventListener('change', archivo, false);
	</script>
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>