<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi cotizacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/carga.css" />
</head>
<body>
<script>    
    window.onload = function () {
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';        
    }
</script>
<img
<?php
    $id_cotizacion = $_GET['id_cotizacion'];
    include "conection.php";
	require 'FPDF/fpdf.php';
	
    $pdf = new FPDF('P','mm','Letter');
    $pdf2 = new FPDF('P','mm','Letter');
	$pdf->SetAutoPageBreak(false);
	$pdf->SetTitle('Cotizacion Casa Baltazar');
	$pdf->AliasNbPages();
    $pdf->AddPage();

    //PDF2
    $pdf2->SetAutoPageBreak(false);
	$pdf2->SetTitle('Cotizacion Casa Baltazar');
	$pdf2->AliasNbPages();
	$pdf2->AddPage();

    //PDF1
	$pdf->AddFont('Hunters','', 'Hunters.php');
	$pdf->SetFont('Hunters','',40);
	//Margen decorativo iniciando en 0, 0
	$pdf->Image('../img/pdf/fondo.png', 0,0, 216, 280, 'PNG');
	//Imagen izquierda
	$pdf->Image('../img/pdf/Loco-Cafe.png', 10, 10, 25, 10, 'PNG');
	//Texto de Título
	$pdf->SetXY(20, 10);
	$pdf->MultiCell(170, 8, utf8_decode('Cotizacion Casa Baltazar' ), 0, 'C');
	//Texto Explicativo
	$pdf->SetFont('Courier','', 9);
	$pdf->SetXY(6, 23);
    $pdf->MultiCell(190, 4, utf8_decode('Cotizacion creada para referencia de precios sobre canastas de armado especial'), 0, 'C');

    //PDF2
    $pdf2->AddFont('Hunters','', 'Hunters.php');
	$pdf2->SetFont('Hunters','',40);
	//Margen decorativo iniciando en 0, 0
	$pdf2->Image('../img/pdf/fondo.png', 0,0, 216, 280, 'PNG');
	//Imagen izquierda
	$pdf2->Image('../img/pdf/Loco-Cafe.png', 10, 10, 25, 10, 'PNG');
	//Texto de Título
	$pdf2->SetXY(20, 10);
	$pdf2->MultiCell(170, 8, utf8_decode('Cotizacion Casa Baltazar' ), 0, 'C');
	//Texto Explicativo
	$pdf2->SetFont('Courier','', 9);
	$pdf2->SetXY(6, 23);
	$pdf2->MultiCell(190, 4, utf8_decode('Cotizacion creada para referencia de precios sobre canastas de armado especial'), 0, 'C');
	
	//Numero de cotizacion
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(84,206,51);
	$pdf->SetXY(170, 33);	
	$pdf->Cell(35,7.5,utf8_decode('No° Cotizacion' ),1,1,'C','true');
	$pdf->SetXY(170, 40.5);
    $pdf->Cell(35,7.5,utf8_decode($id_cotizacion),1,1,'C');
    
    //PDF2
    $pdf2->SetFont('Arial','B',10);
	$pdf2->SetFillColor(84,206,51);
	$pdf2->SetXY(170, 33);	
	$pdf2->Cell(35,7.5,utf8_decode('No° Cotizacion' ),1,1,'C','true');
	$pdf2->SetXY(170, 40.5);
	$pdf2->Cell(35,7.5,utf8_decode($id_cotizacion),1,1,'C');

    //Datos del cliente
    $select_datos = $con->query("SELECT correo,telefono FROM cotizacion WHERE id_cotizacion = ". $id_cotizacion. ";");
    $datos_cliente = $select_datos->fetch_assoc(); 
	$pdf->SetXY(10, 33);
	$pdf->Cell(20,5,utf8_decode('Fecha:'),'LT',1,'L');
	$pdf->Cell(20,5,utf8_decode('Email:'),'L',1,'L');
	$pdf->Cell(20,5,utf8_decode('Telefono:'),'BL',1,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->SetXY(30, 33);
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$pdf->Cell(138,5,$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'),'TR',1,'L');
	$pdf->SetXY(30, 38);
	$pdf->Cell(138,5,utf8_decode($datos_cliente['correo']),'R',1,'L');
	$pdf->SetXY(30, 43);
    $pdf->Cell(138,5,utf8_decode($datos_cliente['telefono']),'RB',1,'L');
    
    //pdf2
	$pdf2->SetXY(10, 33);
	$pdf2->Cell(20,5,utf8_decode('Fecha:'),'LT',1,'L');
	$pdf2->Cell(20,5,utf8_decode('Email:'),'L',1,'L');
	$pdf2->Cell(20,5,utf8_decode('Telefono:'),'BL',1,'L');
	$pdf2->SetFont('Arial','',10);
	$pdf2->SetXY(30, 33);
	$pdf2->Cell(138,5,$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'),'TR',1,'L');
	$pdf2->SetXY(30, 38);
	$pdf2->Cell(138,5,utf8_decode($datos_cliente['correo']),'R',1,'L');
	$pdf2->SetXY(30, 43);
	$pdf2->Cell(138,5,utf8_decode($datos_cliente['telefono']),'RB',1,'L');

	//Linea divisora
	//$pdf->Line(10,51.5,205,51.5);

    //Datos de la canasta
    $select_contenedor = $con->query("SELECT P.nombre, P.ruta FROM producto P, carrito C WHERE C.id_cotizacion =" . $id_cotizacion ." AND C.id_producto = P.id_producto AND P.id_categoria = 2;");
    $contenedor = $select_contenedor->fetch_assoc();
    $select_productos = $con->query("SELECT P.nombre, C.cantidad FROM producto P, carrito C WHERE C.id_cotizacion = " . $id_cotizacion . " AND C.id_producto = P.id_producto AND P.id_categoria != 2 ;");

	$pdf->SetXY(10, 55);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(175,10,utf8_decode('Contenedor Seleccionado:'),1,1,'C');
	$pdf->SetXY(10, 65);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(175,10,utf8_decode($contenedor['nombre']),1,1,'C');
    $pdf->SetXY(185, 55);
    $tipocontenedor =strtoupper(substr($contenedor['ruta'], -3)); 
	$pdf->Cell(20,20, $pdf->Image("../".$contenedor['ruta'], $pdf->GetX(), $pdf->GetY(),20, 20, $tipocontenedor),1);
	$pdf->SetXY(10, 75);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(175,5,utf8_decode('Productos de Canasta'),1,1,'C');
    $pdf->SetFont('Arial','',10);
    $cantidad_pocision = 75;
    $pdf->SetFont('Arial','B',10);
	$pdf->SetXY(185, 75);
    $pdf->Cell(20,5,utf8_decode('Cantidad'),1,1,'C');

    //PDF2
    $pdf2->SetXY(10, 55);
	$pdf2->SetFont('Arial','B',10);
	$pdf2->Cell(175,10,utf8_decode('Contenedor Seleccionado:'),1,1,'C');
	$pdf2->SetXY(10, 65);
	$pdf2->SetFont('Arial','',10);
	$pdf2->Cell(175,10,utf8_decode($contenedor['nombre']),1,1,'C');
    $pdf2->SetXY(185, 55);
	$pdf2->Cell(20,20, $pdf2->Image("../".$contenedor['ruta'], $pdf2->GetX(), $pdf2->GetY(),20, 20, $tipocontenedor),1);
	$pdf2->SetXY(10, 75);
	$pdf2->SetFont('Arial','B',10);
	$pdf2->Cell(175,5,utf8_decode('Productos de Canasta'),1,1,'C');
    $pdf2->SetFont('Arial','',10);
    $pdf2->SetFont('Arial','B',10);
	$pdf2->SetXY(185, 75);
    $pdf2->Cell(20,5,utf8_decode('Cantidad'),1,1,'C');

    $contador=0;
    while ($nombre = $select_productos->fetch_row()){
        $cantidad_pocision = $cantidad_pocision + 5;
        $pdf->SetXY(10, $cantidad_pocision );
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(175,5,utf8_decode($nombre[0]),1,1,'L');          
        $pdf->SetXY(185, ($cantidad_pocision));
        $pdf->Cell(20,5,utf8_decode($nombre[1]),1,1,'C'); 

        //PDF2
        $pdf2->SetXY(10, $cantidad_pocision );
        $pdf2->SetFont('Arial','',10);
        $pdf2->Cell(175,5,utf8_decode($nombre[0]),1,1,'L');          
        $pdf2->SetXY(185, ($cantidad_pocision));
        $pdf2->Cell(20,5,utf8_decode($nombre[1]),1,1,'C'); 

        $contador= $contador +1;
    }

    //Imagenes
    $select_imagenes= $con->query("SELECT P.ruta FROM producto P, carrito C WHERE C.id_cotizacion = " . $id_cotizacion . " AND C.id_producto = P.id_producto AND P.id_categoria != 2 ;");

    $pdf->SetXY(10, ($cantidad_pocision+5));
    $pdf2->SetXY(10, ($cantidad_pocision+5));
    $variable = "PNG";
    $tamaño = 195 / $contador;
    $contador2 = 0;
    while ($ruta = $select_imagenes->fetch_row()){
        $tipo =strtoupper(substr($ruta[0], -3)); 
        if ($contador = $contador2){
            $pdf->Cell($tamaño,$tamaño, $pdf->Image("../" . $ruta[0], $pdf->GetX(), $pdf->GetY(),$tamaño,$tamaño, $tipo),1,1); //Ultima linea debe llevar el salto de linea 
            $pdf2->Cell($tamaño,$tamaño, $pdf2->Image("../" . $ruta[0], $pdf2->GetX(), $pdf->GetY(),$tamaño,$tamaño, $tipo),1,1); //Ultima linea debe llevar el salto de linea 
        }else{
            $pdf->Cell($tamaño,$tamaño, $pdf->Image("../" . $ruta[0], $pdf->GetX(), $pdf->GetY(),$tamaño,$tamaño, $tipo),1);
            $pdf2->Cell($tamaño,$tamaño, $pdf2->Image("../" . $ruta[0], $pdf2->GetX(), $pdf->GetY(),$tamaño,$tamaño, $tipo),1);
        }
        
    }

    //TOTAL
    $select_precio= $con->query("SELECT P.precio FROM producto P, carrito C WHERE C.id_cotizacion = " . $id_cotizacion . " AND C.id_producto = P.id_producto ;");
	$pdf->SetXY(175,( $cantidad_pocision+$tamaño+5));
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(12,5,'Total:',1,'C');
    $pdf->SetFont('Arial','',10);
    
    $pdf2->SetXY(175,( $cantidad_pocision+$tamaño+5));
	$pdf2->SetFont('Arial','B',10);
	$pdf2->Cell(12,5,'Total:',1,'C');
    $pdf2->SetFont('Arial','',10);
    $precio = 0;
    while ($pre = $select_precio->fetch_row()){
        $precio = $precio + $pre[0];
    }
    $pdf->Cell(18,5,"$".$precio,1,1,'C');
    $pdf2->Cell(18,5,"$".$precio,1,1,'C');


	//Politicas y cambios
	$pdf->SetFont('Arial','B',7);
	$pdf->SetXY(5, 260);
	$pdf->MultiCell(170, 5, utf8_decode('Precios sujetos a cambios sin previo aviso, esta es solo una representacion de un precio aproximado del costo total de su canasta, no se confirma ningun pedido hasta que una operadora de nuestra sucursal se comunique directamente al numeror que proporciono.'), 0, 'J');

	$pdf->Image('../img/pdf/whats.png', 177,251, 5, 5, 'PNG');
	$pdf->SetXY(184, 251.5);
	$pdf->Cell(20,5,utf8_decode('271 - 740 - 63 - 35'),0,1,'C');

	$pdf->Image('../img/pdf/tel.png', 177,257, 5, 5, 'PNG');
	$pdf->SetXY(182, 257.5);
	$pdf->Cell(20,5,utf8_decode('71 - 4 - 85 - 14'),0,1,'C');

	$pdf->Image('../img/pdf/fb-logo.png', 177,263, 5, 5, 'PNG');
	$pdf->SetXY(181, 263.5);
	$pdf->Cell(20,5,utf8_decode('CasaBaltazar'),0,1,'C');

	$pdf->Image('../img/pdf/direccion.png', 177,269, 5, 5, 'PNG');
	$pdf->SetXY(187, 269);
    $pdf->Cell(20,5,utf8_decode('Av. 1 entre calles 6 y 8'),0,1,'C');
    $pdf->Output("../doc/CasaBaltazar".$id_cotizacion.".pdf","F");


    //PDF2
    $pdf2->SetFont('Arial','B',7);
	$pdf2->SetXY(5, 260);
	$pdf2->MultiCell(170, 5, utf8_decode('Precios sujetos a cambios sin previo aviso, esta es solo una representacion de un precio aproximado del costo total de su canasta, no se confirma ningun pedido hasta que una operadora de nuestra sucursal se comunique directamente al numeror que proporciono.'), 0, 'J');

	$pdf2->Image('../img/pdf/whats.png', 177,251, 5, 5, 'PNG');
	$pdf2->SetXY(184, 251.5);
	$pdf2->Cell(20,5,utf8_decode('271 - 740 - 63 - 35'),0,1,'C');

	$pdf2->Image('../img/pdf/tel.png', 177,257, 5, 5, 'PNG');
	$pdf2->SetXY(182, 257.5);
	$pdf2->Cell(20,5,utf8_decode('71 - 4 - 85 - 14'),0,1,'C');

	$pdf2->Image('../img/pdf/fb-logo.png', 177,263, 5, 5, 'PNG');
	$pdf2->SetXY(181, 263.5);
	$pdf2->Cell(20,5,utf8_decode('CasaBaltazar'),0,1,'C');

	$pdf2->Image('../img/pdf/direccion.png', 177,269, 5, 5, 'PNG');
	$pdf2->SetXY(187, 269);
    $pdf2->Cell(20,5,utf8_decode('Av. 1 entre calles 6 y 8'),0,1,'C');
    $pdf2->Output("../doc/CasaBaltazar".$id_cotizacion.".pdf","F");
    $doc = $pdf->Output('','S');
    
    session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = $_SESSION['datos'][0];
$mi_pdf = "../doc/CasaBaltazar".$id_cotizacion.".pdf";
ini_set('max_execution_time', 300);
		$mail = new PHPMailer(true);
		try {
		    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'cesarsamuelrohdz@gmail.com';                 // SMTP username
		    $mail->Password = 'rstw$am06798';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('cesarsamuelrohdz@gmail.com', 'Cotizacion Casa Baltazar');
		    $mail->addAddress($email, 'Cliente Cafe Cordoba');     // Add a recipient
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Cotizacion Canastar';
            $mail->Body    = 'Le hemos enviado una cotizacion con los productos que selecciono dentro de la pagina www.Cafecordoba.com y con esta misma se le dara seguimiento a su pedido. Le recordamos que al realizar dicha cotizacion su pedido no se encuentra aun en proceso, para concluir debe de confirmar via telefonica con alguno de nuestros asesores de ventas, los cuales en breve un ejecutivo se pondra en contacto <b>Gracias por su preferencia</b>';
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->AddStringAttachment($doc,"CasaBaltazar".$id_cotizacion.".pdf",'base64', 'application/pdf');
		    $mail->SMTPDebug = 0; //quitar mensajes de diagnostico
		    $mail->send();
            session_destroy();
            print "<script>alert('Cotizacion enviada al correo ".$datos_cliente['correo']."');</script>";
 ?>


                <div id='contenedor_carga'>
                    <div id='carga'>

                    </div>
                </div>

            
           <!-- unlink($mi_pdf); //elimina el archivo creado -->
            <a href="<?php echo $mi_pdf; ?>'" download="CasaBaltazar<?php echo $id_cotizacion;?>'.pdf">Descargar Archivo</a>
            <button href='../index.php\'>Llévame a otro lado</button>
<?php
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ';
        }      
?>


    
</body>
</html>