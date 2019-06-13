<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table{

	function Header(){
		// Title
		$this->SetFont('Times','B',18);
		$this->Cell(0,6,'Listado de Establecimietos',0,1,'C');
		$this->Ln(10);
		// Ensure table header is printed
		parent::Header();
	}

}
// Connect to database
$link = mysqli_connect('localhost','root','','rest');
$pdf = new PDF();
$pdf->AddPage("L");
// First table: output all columns
$pdf->Table($link,'SELECT * FROM reporte');
$pdf->Image('logo1.png',10,2,-200);
$pdf->Output();
?>
