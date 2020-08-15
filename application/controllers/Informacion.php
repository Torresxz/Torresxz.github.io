<?php
require 'application/libraries/FPDF/fpdf.php';
/**------------------------------------------------------------------------
 * Clase que genera PDF de información
 * ------------------------------------------------------------------------
 * @author RQ7 David/Nazareth/Ricardo
 */

class PDF extends FPDF{

    function header(){
        $this->SetY(2);
        $this->SetFont('Arial','I',7);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'R');
        // Logo
        $this->Image('upload/img/logo.png',10,8,60);
        // Arial bold 15
        $this->Ln('5');
        $this->SetFont('Arial','B',11);
        $this->Cell(140,27,'Fecha:',0,0,'R');
        $this->Ln('5');
        $this->Cell(140,27,'COT:',0,0,'R');
        $this->Ln('5');
        $this->Cell(140,27,'No. Proveedor:',0,0,'R');
        $this->Ln(21);
        $this->SetFillColor(105,103,102);
        $this->Cell(0,1,'',0,1,'L',true);
        $this->Ln(1);
        // Arial bold 9
        $this->SetFont('Arial','B',7,'');
        $this->Cell(125,10,utf8_decode('Nombre Fiscal: Ignacio Grande Morales, R.F.C. GAMI760731HA8') ,0,0,'L');
        $this->Cell(70,10,utf8_decode('Acreditación 75284 PERRY JHONSON') ,0,0,'L');;
        $this->Ln(8);

    }

    function footer(){
        $this->SetY(-33);
        $this->SetFont('Arial','I',7);
        $this->Cell(70,27,'Calle Adolfo Lopez Mateos 1A',0,0,'L');
        $this->Cell(60,27,'www.aimec.com.mx',0,0,'C');
        $this->Cell(55,27,'',0,0,'R');
        $this->Ln('5');
        $this->Cell(70,27,'Ocotlan, Tlaxcala, CP, 90100',0,0,'L');
        $this->Cell(60,27,'calidad@aimec.com.mx/',0,0,'C');
        $this->Cell(55,27,'',0,0,'R');
        $this->Ln('5');
        $this->Cell(70,27,'Tel:(10246)462.35.10',0,0,'L');
        $this->Cell(60,27,'servicios@aimec.com.mx/',0,0,'C');
        $this->Cell(55,27,'FOR-RP-0101',0,0,'R');
        $this->Ln('5');
        $this->Cell(70,27,'Cel:246.130.5521',0,0,'L');
        $this->Cell(60,27,'contabilidad1@aimec.com.mx/',0,0,'C');
        $this->Cell(55,27,'Ver.05',0,0,'R');
        $this->Ln('5');

    }


    function ChapterBody($file)
    {
        // Leemos el fichero
        $txt = file_get_contents($file);
        //
        $this->SetFont('Arial','',9);
        // Imprimimos el texto justificado
        $this->MultiCell(0,5,$txt);
        // Salto de línea
        $this->Ln();
        // Cita en itálica
        $this->SetFont('','I');
        $this->Cell(0,5,'(fin del extracto)');
    }

    function PrintChapter($file)
    {
        $this->AddPage();
        $this->ChapterBody($file);
    }

}



// http://localhost/imec/informacion
// Creación del objeto de la clase heredada
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->SetFont('Times','',12);
	$pdf->PrintChapter('upload/img/informacion.txt');
	$pdf->Output();