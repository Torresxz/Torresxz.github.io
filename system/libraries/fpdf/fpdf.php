<<<<<<< HEAD:system/libraries/fpdf/fpdf.php
HEAD
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."libraries/FPDF/fpdf.php";
class CI_PDF extends FPDF{

	function_construct(){
		parent::_construct();
		<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		require_once APPPATH."/libraries/FPDF/FPDF.php";
	}
class CI_PDF extends FPDF{
=======
<<<<<<< HEAD
<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'¡Hola, Mundo!');
$pdf->Output();
?>
=======
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/libraries/FPDF/fpdf.php";
class CI_PDFC extends FPDF{
>>>>>>> 18b3f58b9bf3ae585176d03739d7b06f7ec665d9:system/libraries/PDF.php

	function __construct(){
		parent::__construct();
	}

	public function header(){

	}
<<<<<<< HEAD:system/libraries/fpdf/fpdf.php
	public function footer(){	
}
}

=======
	public function footer(){
		
	}
}
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 18b3f58b9bf3ae585176d03739d7b06f7ec665d9:system/libraries/PDF.php
