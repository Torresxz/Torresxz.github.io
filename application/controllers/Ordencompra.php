<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de ordendecompra
 * ------------------------------------------------------------------------
 *
 * Modulo que permite agregar, editar ordenes de compra
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Ordencompra extends CI_Controller
{

    private $views = 'ordenes_compras/';
    private $model = 'mordencompra';


    public function __construct()
    {
        parent::__construct();

        //Corremos modelo de base de datos
        $this->load->model($this->model);
    }

    /**
     * Muestra la vista principal de ordenes de compras con index
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
        $this->load->view($this->views.'ordenes_de_compras',$data);
    }
    //---------------------------------------------------------------------

    /**
     * Muestra la vista principal de las ordenes de compras
     *
     * @return  Void
     */
    public function ordencompras()
    {
        $data['ordencompra'] = $this->{$this->model}->listar_ordenescompras();
        foreach ($data['ordencompra'] as $key => $ordencompra) {
            $ordencompra->estatusorden = ($ordencompra->estatusorden == 1) ? 'Aprobada' : 'No aprobada';

            $ordencompra->productos = $this->{$this->model}->obtener_productos_ordencompra($ordencompra->idordencompra);

        }
        $this->load->view($this->views.'ordenes_de_compras',$data);
    }
    // -------------------------------------------------------------------


    /**
     * Agrega una nueva orden de compra
     *
     * @return  Void
     */
    public function agregar_ordendecompra()
    {
        //Obtenemos el proveedor
        if( !$data['proveedores'] = $this->{$this->model}->obtener_proveedores() )
            $this->alertas->info('ordencompra/ordenes_compras');

        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_fecha',
                    'label' => 'Fecha',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'revision',
                    'label' => 'Revision',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'subtotal',
                    'label' => 'Subtotal',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'iva',
                    'label' => 'IVA',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'total',
                    'label' => 'Total',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'proveedores',
                    'label' => 'Proveedor',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'input_facturar',
                    'label' => 'Facturar',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_entregar',
                    'label' => 'Entregar',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_formapago',
                    'label' => 'Forma de pago',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_tiempoentrega',
                    'label' => 'Tiempo de entrega',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_garantia',
                    'label' => 'Garantia',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_cfdi',
                    'label' => 'CFDI',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_metodopago',
                    'label' => 'Metodo de pago',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_status',
                    'label' => 'Estatus',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'productos[]',
                    'label' => 'Productos ',
                    'rules' => 'required|numeric'
                ),
            )
        );

        if ($this->form_validation->run() && $this->input->post()) {

            $data = array(
                'idordencompra' => null,
                'Fecha' =>$this->input->post('input_fecha', TRUE),
                'numeroorden' => $this->input->post('orden', TRUE),
                'numerorevision' => $this->input->post('revision', TRUE),
                'subtotal' => $this->input->post('subtotal', TRUE),
                'iva' => $this->input->post('iva', TRUE),
                'total' => $this->input->post('total', TRUE),
                'idprovedor' => $this->input->post('proveedores',TRUE),
                'facturar' => $this->input->post('input_facturar', TRUE),
                'entregar' => $this->input->post('input_entregar', TRUE),
                'formapago' => $this->input->post('input_formapago', TRUE),
                'tiempoentrega' => $this->input->post('input_tiempoentrega', TRUE),
                'garantia' => $this->input->post('input_garantia', TRUE),
                'cfdi' => $this->input->post('input_cfdi', TRUE),
                'metodopago' => $this->input->post('input_metodopago', TRUE),
                'estatusorden' 	=> ($this->input->post('input_status',TRUE) == 'on' ) ? 1 : 0,
            );

            $productos = $this->input->post('productos',TRUE);
            $this->alertas->db($this->{$this->model}->guardar_ordencompraproducto($data, $productos),'ordencompra/ordencompras');

        }

        $data['productos'] = $this->{$this->model}->listar_productos();

        $this->load->view($this->views .'agregar_orden_compra',$data);
    }
    // -------------------------------------------------------------------


    /**
     *  Editar una  orden de compra
     *
     * @return  Void
     */
    public function editar_ordendecompra($id=NULL)
    {

        //Obtenemos la orden de compra a editar
        if( !$data['ordencompra'] = $this->{$this->model}->obtener_ordencompra($id) )
            $this->alertas->info('ordencompra/ordenes_compras');

        //Obtenemos el proveedor
        if( !$data['proveedores'] = $this->{$this->model}->obtener_proveedores() )
            $this->alertas->info('ordencompra/ordenes_compras');

        $data['ordencompra']->productos = $this->{$this->model}->obtener_productos_ordencompra($id);
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_fecha',
                    'label' => 'Fecha',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'orden',
                    'label' => 'Orden',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'revision',
                    'label' => 'Revision',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'subtotal',
                    'label' => 'Subtotal',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'iva',
                    'label' => 'IVA',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'total',
                    'label' => 'Total',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'proveedores',
                    'label' => 'Proveedor',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'input_facturar',
                    'label' => 'Facturar',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_entregar',
                    'label' => 'Entregar',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_formapago',
                    'label' => 'Forma de pago',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_tiempoentrega',
                    'label' => 'Tiempo de entrega',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_garantia',
                    'label' => 'Garantia',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_cfdi',
                    'label' => 'CFDI',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_metodopago',
                    'label' => 'Metodo de pago',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'productos[]',
                    'label' => 'Productos ',
                    'rules' => 'required|numeric'
                ),
            )
        );

        if ($this->form_validation->run() && $this->input->post()) {

            //Obtenemos la orden compra a editar
            if( !$ordencompra = $this->{$this->model}->obtener_ordencompra($this->input->post('id_token',TRUE)) )
                $this->alertas->info('ordencompra/ordenes_compras');


            $data_update = array(
                'Fecha' =>$this->input->post('input_fecha', TRUE),
                'numeroorden' => $this->input->post('orden', TRUE),
                'numerorevision' => $this->input->post('revision', TRUE),
                'subtotal' => $this->input->post('subtotal', TRUE),
                'iva' => $this->input->post('iva', TRUE),
                'total' => $this->input->post('total', TRUE),
                'idprovedor' => $this->input->post('proveedores', TRUE),
                'facturar' => $this->input->post('input_facturar', TRUE),
                'entregar' => $this->input->post('input_entregar', TRUE),
                'formapago' => $this->input->post('input_formapago', TRUE),
                'tiempoentrega' => $this->input->post('input_tiempoentrega', TRUE),
                'garantia' => $this->input->post('input_garantia', TRUE),
                'cfdi' => $this->input->post('input_cfdi', TRUE),
                'metodopago' => $this->input->post('input_metodopago', TRUE),
                'estatusorden' 	=> ($this->input->post('input_status',TRUE) == 'on' ) ? 1 : 0,
            );

            $productos = $this->input->post('productos',TRUE);

            $this->alertas->db($this->{$this->model}->actualizar_ordencompra($ordencompra->idordencompra,$data_update, $productos),'ordencompra/ordencompras');

        }

        //Vista
        $data['productos'] 	= $this->{$this->model}->listar_productos();

        $this->load->view($this->views .'editar_orden_compra',$data);
    }
    // -------------------------------------------------------------------


    /**
     * Elimina una determinada orden de compra
     *
     * @param 	Int
     * @return  Void
     */
    public function ordencompra_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_ordencompra($id),'ordencompra/ordencompras');
    }
    // -------------------------------------------------------------------
    public function prueba(){

        $this->load->Library('PDF');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(40,10,'¡Hola, Mundo!');
        $this->pdf->Output();
    }
    // -------------------------------------------------------------------
    /**
     * ontener datos en pdf
     *
     * @param 	Int
     * @return  Void
     */
    public function reporte_ordencompra($id=NULL){
        //Obtenemos el id de la orden de compra
        if (!$data['ordencompra'] = $this->{$this->model}->obtener_ordencompras($id))
            $this->alertas->info('ordencompra/ordencompras');
        //Obtenemos el listado de ordenes de compras
        if (!$ordencompra = $this->{$this->model}->obtener_productos_ordencompra($id))
            $this->alertas->info('ordencompra/ordencompras'.$id);

        //Cargamos la libreria PDF
        $this->load->Library('FPDF');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        //Encabezado

        foreach($data as $row) {
            $this->pdf->Image('upload/imec.png', 20, 20, 45);
            $this->pdf->SetFont('Arial', 'B', 11);
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
            $this->pdf->SetFillColor(105, 103, 102);
            $this->pdf->Cell(0, 1, '', 0, 1, 'L', true);

            //Cuerpo del documento
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
            //Tabla de relación orden de compra
            $this->pdf->SetFont('Arial', 'B', 9);
            $this->pdf->Cell(38, 5,utf8_decode('Partida'), 1, 0, 'C', '');
            $this->pdf->Cell(38, 5,utf8_decode('Cantidad'), 1, 0, 'C', '');
            $this->pdf->Cell(70, 5, utf8_decode('Descripción'), 1, 0, 'C', '');
            $this->pdf->Cell(38, 5, 'Precio Total', 1, 1, 'C', '');
            //segundo reglon
            foreach($ordencompra as $productos ) {
                // Se imprimen los productos de cada orden de compra
                $this->pdf->Cell(38, 4,1, 1, 0, 'C', '');
                $this->pdf->Cell(38, 4,'1', 1, 0, 'C', '');
                $this->pdf->Cell(70,4,$productos->descripcionproducto, 1, 0, 'C', false);
                $this->pdf->Cell(38,4,$productos->preciounitario, 1, 1, 'C', '');
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
            $this->pdf->Ln('10');

            //Otros datos de la compra
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(27, 12, utf8_decode('Forma de pago:'), 0, 0, '');
            $this->pdf->Cell(55, 12, $row->formapago, 0, 0, '');
            $this->pdf->Ln('5');
            $this->pdf->Cell(32, 12, utf8_decode('Tiempo de entrega:'), 0, 0, '');
            $this->pdf->Cell(72, 12, $row->tiempoentrega, 0, 0, '');
            $this->pdf->Ln('5');
            $this->pdf->Cell(15, 12, utf8_decode('Garantia:'), 0, 0, '');
            $this->pdf->Cell(60, 12, $row->garantia, 0, 0, '');
            $this->pdf->Ln('15');

            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(127, 12, utf8_decode('Favor de enviar copia de factura y datos bancarios al e-mail: para tramites de pago, asi mismo'), 0, 0, '');
            $this->pdf->Ln('5');
            $this->pdf->Cell(127, 12, utf8_decode('toma en cuenta las siguientes especulaciones conforme a la nueva versión 3.3 del CFDI.'), 0, 0, '');
            $this->pdf->Ln('8');

            $this->pdf->Cell(25, 12, utf8_decode('Uso del CFDI:'), 0, 0, '');
            $this->pdf->Cell(60, 12, $row->cfdi, 0, 0, '');
            $this->pdf->Ln('5');
            $this->pdf->Cell(29, 12, utf8_decode('Metodo de Pago:'), 0, 0, '');
            $this->pdf->Cell(65, 12, $row->metodopago, 0, 0, '');
            $this->pdf->Ln('5');
            $this->pdf->Cell(27, 12, utf8_decode('Forma de Pago:'), 0, 0, '');
            $this->pdf->Cell(55, 12, $row->formapago, 0, 0, '');
            $this->pdf->Ln('15');
        }
        $this->pdf->Ln('5');
        $this->pdf->cell(80,4,utf8_decode('________________________'),0,1,'C');
        $this->pdf->cell(280,1,utf8_decode('_________________________'),0,1,'C');

        $this->pdf->Cell(80,12,utf8_decode('Elaboró:'),0,0,'C');
        $this->pdf->Cell(120,9.5,utf8_decode('Autorizó:'),0,0,'C');
        $this->pdf->Ln('5');
        $this->pdf->Cell(80,12,utf8_decode('C.Felipe Hernandez Durán'),0,0,'C');
        $this->pdf->Cell(120,9.5,utf8_decode('C.Gabriela Hernandez Durán'),0,0,'C');
        $this->pdf->Ln('30');

        $this->pdf->Cell(180,12,utf8_decode('FOR-RR-0503'),0,0,'R');
        //Footer
        $this->pdf->SetY(-15);
        $this->pdf->SetFont('Arial','I',8);
        $this->pdf->Cell(10,10,'Page '.$this->pdf->PageNo().'/{nb}',0,0,'C');
        $this->pdf->Output();
    }
}

