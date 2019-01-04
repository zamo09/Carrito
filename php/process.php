<?php 
session_start();
include "conection.php";
$email = $_POST['email'];
$tel = $_POST['tel'];
if(!empty($_POST)){
    $q1 = $con->query("insert into cotizacion(correo,fecha,telefono,estado) value(\"$email\",NOW(),\"$tel\",1)");
        if($q1){
            $cart_id = $con->insert_id;
            foreach($_SESSION["cart"] as $c){
            $q1 = $con->query("insert into carrito(id_producto,cantidad,id_cotizacion) value($c[product_id],$c[q],$cart_id)");
        }
        unset($_SESSION["cart"]);
        unset($_SESSION["categoria"]);
        
    }
}
//echo "insert into carrito(id_producto,cantidad,id_cotizacion) value($c[product_id],$c[q],$cart_id)";
//print "<script>alert('Venta procesada exitosamente');window.location='../products.php';</script>";
$datos = array($email,$tel);
$_SESSION['datos'] = $datos;
//print "<script>alert('Venta procesada exitosamente');window.location='send_mail.php';</script>";
//
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carga</title>
	<link rel="stylesheet" type="text/css" media="screen" href="../css/carga.css" />
</head>
<body>
	<script>    
    carga(){
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';        
    }
</script>
<div id='contenedor_carga2'>
                    <div id='carga2'>

                    </div>
                </div>



<?php
echo "<script>";

echo "carga();";

echo "</script>";
print "<script>window.location='./imprimir.php?id_cotizacion=".$cart_id."';</script>";

?>
</body>
</html>