<?php
require('../fpdf.php');

class PDF extends FPDF
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
//Columna actual
var $col=0;
//Ordenada de comienzo de la columna
var $y0;

function Header()
{
	//Cabacera
	global $title;

	$this->SetFont('Arial','B',15);
	$w=$this->GetStringWidth($title)+6;
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
protected $col = 0; // Columna actual
protected $y0;      // Ordenada de comienzo de la columna

function Header()
{
	// Cabacera
	global $title;

	$this->SetFont('Arial','B',15);
	$w = $this->GetStringWidth($title)+6;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->SetX((210-$w)/2);
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(230,230,0);
	$this->SetTextColor(220,50,50);
	$this->SetLineWidth(1);
	$this->Cell($w,9,$title,1,1,'C',true);
	$this->Ln(10);
<<<<<<< HEAD
	// Guardar ordenada
	$this->y0 = $this->GetY();
=======
<<<<<<< HEAD
	// Guardar ordenada
	$this->y0 = $this->GetY();
=======
<<<<<<< HEAD
	//Guardar ordenada
	$this->y0=$this->GetY();
=======
	// Guardar ordenada
	$this->y0 = $this->GetY();
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
}

function Footer()
{
<<<<<<< HEAD
	// Pie de página
=======
<<<<<<< HEAD
	// Pie de página
=======
<<<<<<< HEAD
	//Pie de página
=======
	// Pie de página
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->SetTextColor(128);
	$this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
}

function SetCol($col)
{
<<<<<<< HEAD
	// Establecer la posición de una columna dada
	$this->col = $col;
	$x = 10+$col*65;
=======
<<<<<<< HEAD
	// Establecer la posición de una columna dada
	$this->col = $col;
	$x = 10+$col*65;
=======
<<<<<<< HEAD
	//Establecer la posición de una columna dada
	$this->col=$col;
	$x=10+$col*65;
=======
	// Establecer la posición de una columna dada
	$this->col = $col;
	$x = 10+$col*65;
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->SetLeftMargin($x);
	$this->SetX($x);
}

function AcceptPageBreak()
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
	//Método que acepta o no el salto automático de página
	if($this->col<2)
	{
		//Ir a la siguiente columna
		$this->SetCol($this->col+1);
		//Establecer la ordenada al principio
		$this->SetY($this->y0);
		//Seguir en esta página
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	// Método que acepta o no el salto automático de página
	if($this->col<2)
	{
		// Ir a la siguiente columna
		$this->SetCol($this->col+1);
		// Establecer la ordenada al principio
		$this->SetY($this->y0);
		// Seguir en esta página
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
		return false;
	}
	else
	{
<<<<<<< HEAD
		// Volver a la primera columna
		$this->SetCol(0);
		// Salto de página
=======
<<<<<<< HEAD
		// Volver a la primera columna
		$this->SetCol(0);
		// Salto de página
=======
<<<<<<< HEAD
		//Volver a la primera columna
		$this->SetCol(0);
		//Salto de página
=======
		// Volver a la primera columna
		$this->SetCol(0);
		// Salto de página
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
		return true;
	}
}

<<<<<<< HEAD
function ChapterTitle($num, $label)
{
	// Título
=======
<<<<<<< HEAD
function ChapterTitle($num, $label)
{
	// Título
=======
<<<<<<< HEAD
function ChapterTitle($num,$label)
{
	//Título
=======
function ChapterTitle($num, $label)
{
	// Título
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->SetFont('Arial','',12);
	$this->SetFillColor(200,220,255);
	$this->Cell(0,6,"Capítulo $num : $label",0,1,'L',true);
	$this->Ln(4);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
	//Guardar ordenada
	$this->y0=$this->GetY();
}

function ChapterBody($fichier)
{
	//Abrir fichero de texto
	$f=fopen($fichier,'r');
	$txt=fread($f,filesize($fichier));
	fclose($f);
	//Fuente
	$this->SetFont('Times','',12);
	//Imprimir texto en una columna de 6 cm de ancho
	$this->MultiCell(60,5,$txt);
	$this->Ln();
	//Cita en itálica
	$this->SetFont('','I');
	$this->Cell(0,5,'(fin del extracto)');
	//Volver a la primera columna
	$this->SetCol(0);
}

function PrintChapter($num,$title,$file)
{
	//Añadir capítulo
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	// Guardar ordenada
	$this->y0 = $this->GetY();
}

function ChapterBody($file)
{
	// Abrir fichero de texto
	$txt = file_get_contents($file);
	// Fuente
	$this->SetFont('Times','',12);
	// Imprimir texto en una columna de 6 cm de ancho
	$this->MultiCell(60,5,$txt);
	$this->Ln();
	// Cita en itálica
	$this->SetFont('','I');
	$this->Cell(0,5,'(fin del extracto)');
	// Volver a la primera columna
	$this->SetCol(0);
}

function PrintChapter($num, $title, $file)
{
	// Añadir capítulo
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
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
