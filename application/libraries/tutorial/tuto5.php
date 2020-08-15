<?php
require('../fpdf.php');

class PDF extends FPDF
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
//Cargar los datos
function LoadData($file)
{
	//Leer las líneas del fichero
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Tabla simple
function BasicTable($header,$data)
{
	//Cabecera
	foreach($header as $col)
		$this->Cell(40,7,$col,1);
	$this->Ln();
	//Datos
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
// Cargar los datos
function LoadData($file)
{
	// Leer las líneas del fichero
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

// Tabla simple
function BasicTable($header, $data)
{
	// Cabecera
	foreach($header as $col)
		$this->Cell(40,7,$col,1);
	$this->Ln();
	// Datos
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	foreach($data as $row)
	{
		foreach($row as $col)
			$this->Cell(40,6,$col,1);
		$this->Ln();
	}
}

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
//Una tabla más completa
function ImprovedTable($header,$data)
{
	//Anchuras de las columnas
	$w=array(40,35,40,45);
	//Cabeceras
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Datos
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
// Una tabla más completa
function ImprovedTable($header, $data)
{
	// Anchuras de las columnas
	$w = array(40, 35, 45, 40);
	// Cabeceras
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	// Datos
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	}
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
	//Línea de cierre
	$this->Cell(array_sum($w),0,'','T');
}

//Tabla coloreada
function FancyTable($header,$data)
{
	//Colores, ancho de línea y fuente en negrita
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	// Línea de cierre
	$this->Cell(array_sum($w),0,'','T');
}

// Tabla coloreada
function FancyTable($header, $data)
{
	// Colores, ancho de línea y fuente en negrita
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
	//Cabecera
	$w=array(40,35,40,45);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
	$this->Ln();
	//Restauración de colores y fuentes
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	//Datos
	$fill=false;
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	// Cabecera
	$w = array(40, 35, 45, 40);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Restauración de colores y fuentes
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Datos
	$fill = false;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
		$this->Ln();
<<<<<<< HEAD
		$fill = !$fill;
	}
	// Línea de cierre
=======
<<<<<<< HEAD
		$fill = !$fill;
	}
	// Línea de cierre
=======
<<<<<<< HEAD
		$fill=!$fill;
	}
=======
		$fill = !$fill;
	}
	// Línea de cierre
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->Cell(array_sum($w),0,'','T');
}
}

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
$pdf=new PDF();
//Títulos de las columnas
$header=array('País','Capital','Superficie (km2)','Pobl. (en miles)');
//Carga de datos
$data=$pdf->LoadData('paises.txt');
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$pdf = new PDF();
// Títulos de las columnas
$header = array('País', 'Capital', 'Superficie (km2)', 'Pobl. (en miles)');
// Carga de datos
$data = $pdf->LoadData('paises.txt');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
