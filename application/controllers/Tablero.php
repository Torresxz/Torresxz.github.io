<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Modulo de Tablero de Información
* ------------------------------------------------------------------------
*
* Modulo tablero de información general del sistema
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class Tablero extends CI_Controller
{

	private $views = 'tablero/';
	private $model = 'Mordencompra';
    private $model2 ='Msistema';



    public function __construct()
    {
        parent::__construct();

        $this->load->model($this->model);
        $this->load->model($this->model2);
       
    }

	/**
     * Muestra la vista principal del tablero
     *
     * @return  Void
     */
	public function index()
	{
       
        
        $data['ordencompra'] = $this->{$this->model}->listar_ordenescompras();
        foreach ($data['ordencompra'] as $key => $ordencompra) {
            $ordencompra->estatusorden = ($ordencompra->estatusorden == 1) ? 'Aprobada' : 'No aprobada';
            $ordencompra->productos = $this->{$this->model}->obtener_productos_ordencompra($ordencompra->idordencompra);
        }
		//$this->load->view('template');
        $this->load->view($this->views.'template',$data);
	}
  

    
	//------------------------HOLA MUNDO---------------------------------------------
    //INTEGRANTES: ARELI ARADY AGUILAR OROPEZA, ANA MARIA MARTINEZ ANTONIO Y KAREN NAYELY RODRIGUEZ TINO 

	 public function prueba1(){

        $this->load->Library('fpdf');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(40, 10,utf8_decode('¡Holaaaaaaaaaaa Mundo!'));
     
        $this->pdf->Output();
    }
	// --------------------------ORDEN COMPRA-----------------------------------------
	public function prueba2($id=NULL){

        //Se realiza la consulta orden-proveedor
        if (!$data['ordencompra'] = $this->{$this->model}->obtener_ordencompras($id))
           $this->alertas->info('ordencompra/ordencompras');
        //Se realiza la consulta productos
         if (!$ordencompra = $this->{$this->model}->obtener_productos_ordencompra($id))
            $this->alertas->info('ordencompra/ordencompras'.$id);

        // llamar a la libreria
        $this->load->library('fpdf'); 
        $this->pdf = new FPDF();
        $this->pdf->AliasNbPages();
        $this->pdf->Addpage();  


        foreach($data as $row) {
        //Encabezado       
        $this->pdf->Image('upload/imec.png',15,15,45);
        $this->pdf->SetFont('Arial','B',11);  
        $this->pdf->Cell(112.5, 27, 'Fecha:', 0, 0, 'R');
        $this->pdf->Cell(10, 27, $row->Fecha, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(140, 27, 'No.Orden de Compra:', 0, 0, 'R');
        $this->pdf->Cell(20, 27, $row->idordencompra, 0, 0, '');
        $this->pdf->Cell(25, 27, '/2020', 0, 0, 'R');
        $this->pdf->Ln('5');
        $this->pdf->Cell(127, 27, utf8_decode('No de Versión:'), 0, 0, 'R');
        $this->pdf->Cell(20, 27, $row->numerorevision, 0, 0, '');
        $this->pdf->Ln(21);
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(0,0,'',0,1,'L',true);
           
        //Cuerpo
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(18, 12, utf8_decode('Proveedor:'), 0, 0, '');
        $this->pdf->Cell(60, 12,$row->proveedor, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(8, 12, utf8_decode('RFC:'), 0, 0, '');
        $this->pdf->Cell(40, 12,$row->rfc, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(7, 12, utf8_decode('Tel:'), 0, 0, '');
        $this->pdf->Cell(40, 12,$row->telefono, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(7, 12, utf8_decode('Fax:'), 0, 0, '');
        $this->pdf->Cell(40, 12,$row->fax, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(16, 12, utf8_decode('Contacto:'), 0, 0, '');
        $this->pdf->Cell(40, 12,$row->contacto, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(12, 12, utf8_decode('e-mail:'), 0, 0, '');
        $this->pdf->Cell(40, 12,$row->correo, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(125, 5, utf8_decode('Entregar en:'), 0, 0, 'R');
        $this->pdf->Cell(125, 5, $row->entregar, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(127, 12, utf8_decode('Facturar a:'), 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(12, 12, $row->facturar, 0, 0, '');
        $this->pdf->Ln('20');

        //Encabezado de tabla
        $this->pdf->SetFont('Arial','B' , 9);
        $this->pdf->Cell(38,5,'Partida',1,0,'C','');
        $this->pdf->Cell(38,5,'Cantidad',1,0,'C','');
        $this->pdf->Cell(70,5,utf8_decode('Descripción:'),1,0,'C','');
        $this->pdf->Cell(38,5,'Precio Total',1,1,'C','');

        foreach($ordencompra as $productos ) {
        // Se extraen los productos
        $this->pdf->Cell(38, 4,1, 1, 0, 'C', '');
        $this->pdf->Cell(38, 4,'1', 1, 0, 'C', '');
        $this->pdf->CellFitSpace(70,4,utf8_decode($productos->descripcionproducto), 1, 0, 'C', '');
      //$this->pdf->Vcell(70,4,utf8_decode($productos->descripcionproducto), 1, 0, 'C', '');
        $this->pdf->Cell(38,4,$productos->preciounitario, 1, 0, 'C', '');
        $this->pdf->Ln('4');
        }
        
        $this->pdf->Cell(38, 5,'', 1, 0, 'C', '');
        $this->pdf->Cell(38, 5,'', 1, 0, 'C', '');
        $this->pdf->Cell(70, 5, utf8_decode('Referencia:'), 1, 0, 'C', '');
        $this->pdf->Cell(38, 5, '', 1, 1, 'C', '');
        $this->pdf->Cell(146, 5,utf8_decode('Subtotal:'), 0, 0, 'R', '');
        $this->pdf->Cell(38, 5,$row->subtotal, 1, 1, 'C', '');
        $this->pdf->Cell(146, 5,utf8_decode('16% iva'), 0, 0, 'R', '');
        $this->pdf->Cell(38, 5, 0.16*$row->subtotal, 1, 1, 'C', '');
        $this->pdf->Cell(146, 5,'Total', 0, 0, 'R', '');
        $this->pdf->Cell(38, 5,( 0.16*$row->subtotal+$row->subtotal), 1, 1, 'C', '');
       

        //Ultimos datos
        $this->pdf->Ln('35');
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(27, 12, utf8_decode('Forma de pago:'), 0, 0, '');
        $this->pdf->Cell(55, 12, $row->formapago, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(32, 12, utf8_decode('Tiempo de entrega:'), 0, 0, '');
        $this->pdf->Cell(72, 12, $row->tiempoentrega, 0, 0, '');
        $this->pdf->Ln('5');
        $this->pdf->Cell(15, 12, utf8_decode('Garantia:'), 0, 0, '');
        $this->pdf->Cell(60, 12, $row->garantia, 0, 0, ''); 
        $this->pdf->Ln('18');
        $this->pdf->MultiCell(190,4,utf8_decode('Favor de enviar copia de factura y datos bancarios a;e-mail:contabilidad1@aimec.com.mx para tramites de pago, asi mismo tomar en cuenta las siguientes especificaciones conforme a la nueva versión 3.3 del CFDI'),0,'L',0);        
        $this->pdf->Cell(40,6,utf8_decode(''),0,1,'L');
        $this->pdf->Cell(33, 12, utf8_decode('-   Uso del CFDI:'), 0, 0, '');
        $this->pdf->Cell(55, 12, $row->cfdi, 0, 0, 'L');
        $this->pdf->Ln('5');
        $this->pdf->Cell(33, 12, utf8_decode('-   Metodo de Pago:'), 0, 0, '');
        $this->pdf->Cell(55, 12, $row->metodopago, 0, 0, 'L');
        $this->pdf->Ln('5');
        $this->pdf->Cell(33, 12, utf8_decode('-   Forma de Pago:'), 0, 0, '');
        $this->pdf->Cell(55, 12, $row->formapago, 0, 0, 'L');
    }
        //Firmas
        $this->pdf->Ln('18');
        $this->pdf->cell(80,12,utf8_decode('__________________________'),0,0,'C');
        $this->pdf->cell(120,12,utf8_decode('__________________________'),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(80,12,utf8_decode('Elaboró:'),0,0,'C');
        $this->pdf->Cell(120,12,utf8_decode('Autorizó:'),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(80,12,utf8_decode('C.Felipe Hernandez Durán'),0,0,'C');
        $this->pdf->Cell(120,12,utf8_decode('C.Gabriela Hernandez Durán'),0,0,'C');
        $this->pdf->Ln('13');

         
        $this->pdf->Cell(60,11,utf8_decode(''),0,1,'C');
        $this->pdf->Cell(190,1,utf8_decode('FOR-RR-0503'),0,1,'R');
        $this->pdf->Output();
    }

    // ---------------------REPORTE GENERAL DEL SERVICIO--------------------------------
     public function prueba3(){

        $this->load->library('fpdf');
        $this->pdf = new FPDF('L','mm','A4');
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',10);

        //Encabezado
        $this->pdf->Image('upload/imec.png',10,10,45);
        $this->pdf->cell(515,4,utf8_decode('FOR-PT-300'),0,1,'C');
        $this->pdf->cell(500,4,utf8_decode('Ver:'),0,1,'C');
        $this->pdf->cell(505,4,utf8_decode('Pagina'),0,1,'C');        
        $this->pdf->Ln(10);

        //Titulo
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(0,0,'',0,1,'L',true);  
        $this->pdf->Ln(3.5);
        $this->pdf->SetFillColor(205,205,205);
        $this->pdf->Cell(0,6,"REPORTE GENERAL DEL SERVICIO",0,1,'C',true);
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(0,0,'',0,1,'L',true); 

        //1
        $this->pdf->SetY(55);
        $this->pdf->SetX(50);
        $this->pdf->cell(10,7,utf8_decode(''),1,0,'C');
        $this->pdf->cell(50,10,utf8_decode('Requerimiento adicional'),0,1,'L','0');

        $this->pdf->SetY(62);
        $this->pdf->SetX(125);     
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(162,0,'',0,1,'R',true);     
        $this->pdf->SetY(75);
        $this->pdf->SetX(125);     
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(162,0,'',0,1,'R',true);

        // 2
        $this->pdf->SetY(80);
        $this->pdf->SetX(50);
        $this->pdf->cell(10,7,utf8_decode(''),1,0,'C');
        $this->pdf->cell(50,10,utf8_decode('Observaciones'),0,1,'L','0');

        $this->pdf->SetY(87);
        $this->pdf->SetX(125);     
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(162,0,'',0,1,'R',true);     
        $this->pdf->SetY(100);
        $this->pdf->SetX(125);     
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(162,0,'',0,1,'R',true);
        
        //3
        $this->pdf->SetY(105);
        $this->pdf->SetX(50);
        $this->pdf->cell(10,7,utf8_decode(''),1,0,'C');
        $this->pdf->cell(50,10,utf8_decode('Otros'),0,1,'L','0');

        $this->pdf->SetY(112);
        $this->pdf->SetX(125);     
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(162,0,'',0,1,'R',true);     
        $this->pdf->SetY(125);
        $this->pdf->SetX(125);     
        $this->pdf->SetFillColor(0,0,0);
        $this->pdf->Cell(162,0,'',0,1,'R',true);

        //firmas
        $this->pdf->Ln('15');
        $this->pdf->cell(80,12,utf8_decode('__________________________'),0,0,'C');
        $this->pdf->cell(100,10,utf8_decode('_________________________'),0,0,'C');
        $this->pdf->cell(120,10,utf8_decode('_________________________'),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(80,12,utf8_decode('Responsable de servicio'),0,0,'C');
        $this->pdf->Cell(100,10,utf8_decode('Agente de ventas'),0,0,'C');
        $this->pdf->Cell(120,10,utf8_decode('Responsable de Laboratorio'),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(80,12,utf8_decode('Fecha y firma'),0,0,'C');
        $this->pdf->Cell(100,10,utf8_decode('Fecha y firma'),0,0,'C');
        $this->pdf->Cell(120,10,utf8_decode('Fecha y firma'),0,0,'C'); 

        $this->pdf->Output();

    }     

// -------------------------------------------------------------------
}

