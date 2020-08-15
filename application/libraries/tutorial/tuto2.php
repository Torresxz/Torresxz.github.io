<?php
require('../fpdf.php');

class PDF extends FPDF
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
//Cabecera de página
function Header()
{
	//Logo
	$this->Image('logo_pb.png',10,8,33);
	//Arial bold 15
	$this->SetFont('Arial','B',15);
	//Movernos a la derecha
	$this->Cell(80);
	//Título
	$this->Cell(30,10,'Title',1,0,'C');
	//Salto de línea
	$this->Ln(20);
}

//Pie de página
function Footer()
{
	//Posición: a 1,5 cm del final
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//Número de página
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
// Cabecera de página
function Header()
{
	// Logo
	$this->Image('logo_pb.png',10,8,33);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Movernos a la derecha
	$this->Cell(80);
	// Título
	$this->Cell(30,10,'Title',1,0,'C');
	// Salto de línea
	$this->Ln(20);
}

// Pie de página
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Número de página
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

<<<<<<< HEAD
// Creación del objeto de la clase heredada
$pdf = new PDF();
=======
<<<<<<< HEAD
// Creación del objeto de la clase heredada
$pdf = new PDF();
=======
<<<<<<< HEAD
//Creación del objeto de la clase heredada
$pdf=new PDF();
=======
// Creación del objeto de la clase heredada
$pdf = new PDF();
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
	$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
?>
