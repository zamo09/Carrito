<!DOCTYPE html PUBLIC>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Reporte Papeleria</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="js/tablecloth.js"></script>
	</head>
	<body>
		<?php 
			$SQL = "SELECT * FROM categoria WHERE activo = 1";
			include("php/coneccion.php");
			$conexion = mysql_connect($servidor,$usuario,$contraseña);
						mysql_select_db($BD,$conexion);
						mysql_query("SET NAMES 'utf8'");
			$selectTable = mysql_query($SQL,$conexion);
		?>
		<div id="container" class="container">	
			<div id="content">
				<h1>Lista de productos</h1>
				<div class="row">
					<div class="col-md-12">
						<input class="form-control" type="text" id="Buscador" onkeyup="myFunction()" placeholder="Buscar por nombre">
					</div>
				</div>
				<br>
				<table id="myTable" class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th>Codigo</th>
							<th>Nombre</th>
							<th>Eliminar</th>
						</tr>
					</thead>
				<?php
				while ($fila = mysql_fetch_array($selectTable)){
					echo '<tr>';
						echo '<td>' . $fila[0] . '</td>';
						echo '<td>' . $fila[1] . '</td>';
						echo '<td> <a class="btn btn-outline-danger btn-sm" href=php/eliminar_producto.php?id='. $fila[0] .'>Eliminar</a>';
					echo '</tr>';
				}
				?>
				</table>
				<a class="btn btn-success" href=javascript:window.print();>Imprimir</a>
				<input class="btn btn-info" name="Restablecer" type="reset" value="Atras" onClick="history.back()">
			</div>
		</div>	
<script>
function myFunction() {
  // declarar variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("Buscador");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // En la seccion de la td esta la columna en la cual va a buscar 
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

	</body>
</html>