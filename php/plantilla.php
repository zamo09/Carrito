<?php
	require 'FPDF/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('../img/pdf/logo.jpg', 5, 0, 25 );
			$this->SetFont('Arial','B',15);
			$this->Cell(40);
			$this->Cell(120,10, 'Reporte De Productos',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>