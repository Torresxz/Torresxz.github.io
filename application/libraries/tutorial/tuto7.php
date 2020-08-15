<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
define('FPDF_FONTPATH','./');
require('../fpdf.php');

$pdf=new FPDF();
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
define('FPDF_FONTPATH','.');
require('../fpdf.php');

$pdf = new FPDF();
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$pdf->AddFont('Calligrapher','','calligra.php');
$pdf->AddPage();
$pdf->SetFont('Calligrapher','',35);
$pdf->Cell(0,10,'Enjoy new fonts with FPDF!');
$pdf->Output();
?>
