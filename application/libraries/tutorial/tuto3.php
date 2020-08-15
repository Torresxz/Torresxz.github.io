<?php
require('../fpdf.php');

class PDF extends FPDF
{
function Header()
{
	global $title;

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
	//Arial bold 15
	$this->SetFont('Arial','B',15);
	//Calculamos ancho y posici�n del t�tulo.
	$w=$this->GetStringWidth($title)+6;
	$this->SetX((210-$w)/2);
	//Colores de los bordes, fondo y texto
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(230,230,0);
	$this->SetTextColor(220,50,50);
	//Ancho del borde (1 mm)
	$this->SetLineWidth(1);
	//T�tulo
	$this->Cell($w,9,$title,1,1,'C',true);
	//Salto de l�nea
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Calculamos ancho y posici�n del t�tulo.
	$w = $this->GetStringWidth($title)+6;
	$this->SetX((210-$w)/2);
	// Colores de los bordes, fondo y texto
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(230,230,0);
	$this->SetTextColor(220,50,50);
	// Ancho del borde (1 mm)
	$this->SetLineWidth(1);
	// T�tulo
	$this->Cell($w,9,$title,1,1,'C',true);
	// Salto de l�nea
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->Ln(10);
}

function Footer()
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
	//Posici�n a 1,5 cm del final
	$this->SetY(-15);
	//Arial it�lica 8
	$this->SetFont('Arial','I',8);
	//Color del texto en gris
	$this->SetTextColor(128);
	//N�mero de p�gina
	$this->Cell(0,10,'P�gina '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num,$label)
{
	//Arial 12
	$this->SetFont('Arial','',12);
	//Color de fondo
	$this->SetFillColor(200,220,255);
	//T�tulo
	$this->Cell(0,6,"Cap�tulo $num : $label",0,1,'L',true);
	//Salto de l�nea
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	// Posici�n a 1,5 cm del final
	$this->SetY(-15);
	// Arial it�lica 8
	$this->SetFont('Arial','I',8);
	// Color del texto en gris
	$this->SetTextColor(128);
	// N�mero de p�gina
	$this->Cell(0,10,'P�gina '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
	// Arial 12
	$this->SetFont('Arial','',12);
	// Color de fondo
	$this->SetFillColor(200,220,255);
	// T�tulo
	$this->Cell(0,6,"Cap�tulo $num : $label",0,1,'L',true);
	// Salto de l�nea
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->Ln(4);
}

function ChapterBody($file)
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
	//Leemos el fichero
	$f=fopen($file,'r');
	$txt=fread($f,filesize($file));
	fclose($f);
	//Times 12
	$this->SetFont('Times','',12);
	//Imprimimos el texto justificado
	$this->MultiCell(0,5,$txt);
	//Salto de l�nea
	$this->Ln();
	//Cita en it�lica
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	// Leemos el fichero
	$txt = file_get_contents($file);
	// Times 12
	$this->SetFont('Times','',12);
	// Imprimimos el texto justificado
	$this->MultiCell(0,5,$txt);
	// Salto de l�nea
	$this->Ln();
	// Cita en it�lica
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->SetFont('','I');
	$this->Cell(0,5,'(fin del extracto)');
}

<<<<<<< HEAD
function PrintChapter($num, $title, $file)
=======
<<<<<<< HEAD
function PrintChapter($num, $title, $file)
=======
<<<<<<< HEAD
function PrintChapter($num,$title,$file)
=======
function PrintChapter($num, $title, $file)
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
{
	$this->AddPage();
	$this->ChapterTitle($num,$title);
	$this->ChapterBody($file);
}
}

<<<<<<< HEAD
$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
=======
<<<<<<< HEAD
$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
=======
<<<<<<< HEAD
$pdf=new PDF();
$title='20000 Leguas de Viaje Submarino';
=======
$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$pdf->SetTitle($title);
$pdf->SetAuthor('Julio Verne');
$pdf->PrintChapter(1,'UN RIZO DE HUIDA','20k_c1.txt');
$pdf->PrintChapter(2,'LOS PROS Y LOS CONTRAS','20k_c2.txt');
$pdf->Output();
?>
