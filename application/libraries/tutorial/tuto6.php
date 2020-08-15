<?php
require('../fpdf.php');

class PDF extends FPDF
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
var $B;
var $I;
var $U;
var $HREF;

function PDF($orientation='P',$unit='mm',$format='A4')
{
	//Llama al constructor de la clase padre
	$this->FPDF($orientation,$unit,$format);
	//Iniciación de variables
	$this->B=0;
	$this->I=0;
	$this->U=0;
	$this->HREF='';
}

function WriteHTML($html)
{
	//Intérprete de HTML
	$html=str_replace("\n",' ',$html);
	$a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
	// Intérprete de HTML
	$html = str_replace("\n",' ',$html);
	$a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	foreach($a as $i=>$e)
	{
		if($i%2==0)
		{
<<<<<<< HEAD
			// Text
=======
<<<<<<< HEAD
			// Text
=======
<<<<<<< HEAD
			//Text
=======
			// Text
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
			if($this->HREF)
				$this->PutLink($this->HREF,$e);
			else
				$this->Write(5,$e);
		}
		else
		{
<<<<<<< HEAD
			// Etiqueta
=======
<<<<<<< HEAD
			// Etiqueta
=======
<<<<<<< HEAD
			//Etiqueta
=======
			// Etiqueta
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
			if($e[0]=='/')
				$this->CloseTag(strtoupper(substr($e,1)));
			else
			{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
				//Extraer atributos
				$a2=explode(' ',$e);
				$tag=strtoupper(array_shift($a2));
				$attr=array();
				foreach($a2 as $v)
				{
					if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
						$attr[strtoupper($a3[1])]=$a3[2];
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
				// Extraer atributos
				$a2 = explode(' ',$e);
				$tag = strtoupper(array_shift($a2));
				$attr = array();
				foreach($a2 as $v)
				{
					if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
						$attr[strtoupper($a3[1])] = $a3[2];
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
				}
				$this->OpenTag($tag,$attr);
			}
		}
	}
}

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
function OpenTag($tag,$attr)
{
	//Etiqueta de apertura
	if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,true);
	if($tag=='A')
		$this->HREF=$attr['HREF'];
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
function OpenTag($tag, $attr)
{
	// Etiqueta de apertura
	if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,true);
	if($tag=='A')
		$this->HREF = $attr['HREF'];
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	if($tag=='BR')
		$this->Ln(5);
}

function CloseTag($tag)
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
	//Etiqueta de cierre
	if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,false);
	if($tag=='A')
		$this->HREF='';
}

function SetStyle($tag,$enable)
{
	//Modificar estilo y escoger la fuente correspondiente
	$this->$tag+=($enable ? 1 : -1);
	$style='';
	foreach(array('B','I','U') as $s)
	{
		if($this->$s>0)
			$style.=$s;
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	// Etiqueta de cierre
	if($tag=='B' || $tag=='I' || $tag=='U')
		$this->SetStyle($tag,false);
	if($tag=='A')
		$this->HREF = '';
}

function SetStyle($tag, $enable)
{
	// Modificar estilo y escoger la fuente correspondiente
	$this->$tag += ($enable ? 1 : -1);
	$style = '';
	foreach(array('B', 'I', 'U') as $s)
	{
		if($this->$s>0)
			$style .= $s;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	}
	$this->SetFont('',$style);
}

<<<<<<< HEAD
function PutLink($URL, $txt)
{
	// Escribir un hiper-enlace
=======
<<<<<<< HEAD
function PutLink($URL, $txt)
{
	// Escribir un hiper-enlace
=======
<<<<<<< HEAD
function PutLink($URL,$txt)
{
	//Escribir un hiper-enlace
=======
function PutLink($URL, $txt)
{
	// Escribir un hiper-enlace
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
	$this->SetTextColor(0,0,255);
	$this->SetStyle('U',true);
	$this->Write(5,$txt,$URL);
	$this->SetStyle('U',false);
	$this->SetTextColor(0);
}
}

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
$html='Ahora puede imprimir fácilmente texto mezclando diferentes estilos: <b>negrita</b>, <i>itálica</i>,
<u>subrayado</u>, o ¡ <b><i><u>todos a la vez</u></i></b>!<br><br>También puede incluir enlaces en el
texto, como <a href="http://www.fpdf.org">www.fpdf.org</a>, o en una imagen: pulse en el logotipo.';

$pdf=new PDF();
//Primera página
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$html = 'Ahora puede imprimir fácilmente texto mezclando diferentes estilos: <b>negrita</b>, <i>itálica</i>,
<u>subrayado</u>, o ¡ <b><i><u>todos a la vez</u></i></b>!<br><br>También puede incluir enlaces en el
texto, como <a href="http://www.fpdf.org">www.fpdf.org</a>, o en una imagen: pulse en el logotipo.';

$pdf = new PDF();
// Primera página
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$pdf->AddPage();
$pdf->SetFont('Arial','',20);
$pdf->Write(5,'Para saber qué hay de nuevo en este tutorial, pulse ');
$pdf->SetFont('','U');
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
$link=$pdf->AddLink();
$pdf->Write(5,'aquí',$link);
$pdf->SetFont('');
//Segunda página
=======
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$link = $pdf->AddLink();
$pdf->Write(5,'aquí',$link);
$pdf->SetFont('');
// Segunda página
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 1672c9d5b64185bb739eb42deae91a73194e8749
>>>>>>> f6471c88265bd1992b1f0af80b2fc761f5760abc
>>>>>>> 90fb01cc4bd77de7d9b395717f0fe00c9fb61dc9
$pdf->AddPage();
$pdf->SetLink($link);
$pdf->Image('logo.png',10,12,30,0,'','http://www.fpdf.org');
$pdf->SetLeftMargin(45);
$pdf->SetFontSize(14);
$pdf->WriteHTML($html);
$pdf->Output();
?>
