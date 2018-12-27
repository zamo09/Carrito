<?php
	include "conection.php";
	require 'FPDF/fpdf.php';
	
	$pdf = new FPDF('P','mm','Letter');
	$pdf->SetAutoPageBreak(false);
	$pdf->SetTitle('Cotizacion Casa Baltazar');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->AddFont('Hunters','', 'Hunters.php');
	$pdf->SetFont('Hunters','',40);
	//Margen decorativo iniciando en 0, 0
	$pdf->Image('../img/pdf/fondo.png', 0,0, 216, 280, 'PNG');
	//Imagen izquierda
	$pdf->Image('../img/pdf/Loco-Cafe.png', 10, 10, 25, 10, 'PNG');
	//Texto de Título
	$pdf->SetXY(20, 10);
	$pdf->MultiCell(170, 8, utf8_decode('Cotizacion Casa Baltazar'), 0, 'C');
	//Texto Explicativo
	$pdf->SetFont('Courier','', 9);
	$pdf->SetXY(6, 23);
	$pdf->MultiCell(190, 4, utf8_decode('Cotizacion creada para referencia de precios sobre canastas de armado especial'), 0, 'C');
	
	//Numero de cotizacion
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(84,206,51);
	$pdf->SetXY(170, 33);	
	$pdf->Cell(35,7.5,utf8_decode('No° Cotizacion'),1,1,'C','true');
	$pdf->SetXY(170, 40.5);
	$pdf->Cell(35,7.5,utf8_decode('335845'),1,1,'C');

	//Datos del cliente
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
	$pdf->Cell(138,5,utf8_decode('samyy_1614@hotmail.com'),'R',1,'L');
	$pdf->SetXY(30, 43);
	$pdf->Cell(138,5,utf8_decode('271-104-22-33'),'RB',1,'L');

	//Linea divisora
	//$pdf->Line(10,51.5,205,51.5);

	//Datos de la canasta	
	$pdf->SetXY(10, 55);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(175,10,utf8_decode('Contenedor Seleccionado:'),1,1,'C');
	$pdf->SetXY(10, 65);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(175,10,utf8_decode('Arcon Grande'),1,1,'C');
	$pdf->SetXY(185, 55);
	$pdf->Cell(20,20, $pdf->Image('../img/12963.gif', $pdf->GetX(), $pdf->GetY(),20, 20, 'GIF'),1);
	$pdf->SetXY(10, 75);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(175,5,utf8_decode('Productos de Canasta'),1,1,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(175,5,utf8_decode('Costal Café Córdoba 500G'),1,1,'L');
	$pdf->Cell(175,5,utf8_decode('Brandy Terry Centenario, 700ml'),1,1,'L');
	$pdf->Cell(175,5,utf8_decode('Brandy Torres 10, 700ml'),1,1,'L');
	$pdf->Cell(175,5,utf8_decode('Cafe de chocolate'),1,1,'L');
	$pdf->Cell(175,5,utf8_decode('Costal de Café Córdoba Prima Lavado, 500g'),1,1,'L');

	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(185, 75);
	$pdf->Cell(20,5,utf8_decode('Cantidad'),1,1,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->SetXY(185, 80);
	$pdf->Cell(20,5,utf8_decode('1'),1,1,'C');
	$pdf->SetXY(185, 85);
	$pdf->Cell(20,5,utf8_decode('1'),1,1,'C');
	$pdf->SetXY(185, 90);
	$pdf->Cell(20,5,utf8_decode('1'),1,1,'C');
	$pdf->SetXY(185, 95);
	$pdf->Cell(20,5,utf8_decode('1'),1,1,'C');
	$pdf->SetXY(185, 100);
	$pdf->Cell(20,5,utf8_decode('1'),1,1,'C');

	$pdf->SetXY(10, 105);
	$variable = "PNG";
	$pdf->Cell(39,39, $pdf->Image('../img/10178.gif', $pdf->GetX(), $pdf->GetY(),39, 39,'GIF'),1);
	$pdf->Cell(39,39, $pdf->Image('../img/c500m_1.png', $pdf->GetX(), $pdf->GetY(),39, 39,'PNG'),1);
	$pdf->Cell(39,39, $pdf->Image('../img/l500l.png', $pdf->GetX(), $pdf->GetY(),39, 39,$variable),1);
	$pdf->Cell(39,39, $pdf->Image('../img/no.png', $pdf->GetX(), $pdf->GetY(),39, 39,$variable),1);
	$pdf->Cell(39,39, $pdf->Image('../img/10179.gif', $pdf->GetX(), $pdf->GetY(),39, 39,'GIF'),1,1); //Ultima linea debe llevar el salto de linea 

	//TOTAL
	$pdf->SetX(175);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(12,5,'Total:',1,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(18,5,'$1758.50',1,'C');


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



	$pdf->Output(); 
?>