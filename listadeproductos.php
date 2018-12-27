<!DOCTYPE html PUBLIC>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Reporte Papeleria</title>
		<script type="text/javascript" src="js/tablecloth.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
	<?php include("modulos/head.php"); ?>
		<?php 
			$SQL = "Select p.id_producto, p.nombre, p.precio, p.cantidad_max, p.cantidad_min, p.cantidad_rea, c.nombre FROM producto p, categoria c where p.activo = 1 and p.id_categoria = c.id_categoria;";
			include "php/coneccion.php";
			$conexion = mysql_connect($servidor,$usuario,$contraseña);
						mysql_select_db($BD,$conexion);
						mysql_query("SET NAMES 'utf8'");
			$selectTable = mysql_query($SQL,$conexion);
		?>
		<div id="container" class="container margensuperior">	
			<div id="content">
				<br><br>
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
							<th>Precio</th>
							<th>Maxima</th>
							<th>Minima</th>
							<th>Real</th>
							<th>Categoria</th>
							<th>Eliminar</th>
						</tr>
					</thead>
				<?php
				while ($fila = mysql_fetch_array($selectTable)){					
					echo '<tr>';
						echo '<td>' . $fila[0] . '</td>';
						echo '<td>' . $fila[1] . '</td>';
						echo '<td>$' . $fila[2] . '</td>';
						echo '<td>' . $fila[3] . '</td>';
						echo '<td>' . $fila[4] . '</td>';
						echo '<td>' . $fila[5] . '</td>';
						echo '<td>' . $fila[6] . '</td>';
						echo '<td> <a class="btn btn-outline-danger btn-sm" href=php/eliminar_producto.php?id='. $fila[0] .'>Eliminar</a>';
					echo '</tr>';
				}
						
				?>
				</table>
				<a class="btn btn-success" href=javascript:window.print();>Imprimir</a>
				<input class="btn btn-info" name="Restablecer" type="reset" value="Atras" onClick="history.back()">
			</div>
		</div>	
		<br><br>
<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, j, visible;
  input = document.getElementById("Buscador");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // recorrer las filas que buscara apartir de la fila i
  for (i = 1; i < tr.length; i++) {
    visible = false;
    /* Obtenemos todas las celdas de la fila, no sólo la primera */
    td = tr[i].getElementsByTagName("td");
    for (j = 0; j < td.length; j++) {
      if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
        visible = true;
      }
    }
    if (visible === true) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}
</script>
	<?php include("modulos/footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

	</body>
</html>