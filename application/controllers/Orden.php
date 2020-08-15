<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de orden de servicios
 * ------------------------------------------------------------------------
 *
 * Modulo que permite agregar ordenes de servicio
 *
 * @author Ulises Flores Garcia/ Ernesto Giovani Ramirez Muñoz/ 8º "B"
 *
 */
class   Orden extends CI_Controller
{

    private $views = 'orden/';
    private $model = 'morden';


    public function __construct()
    {
        parent::__construct();

        //Corremos modelo de base de datos
        $this->load->model($this->model);
    }

    /**
     * Muestra la vista principal
     *
     * @return  Void
     */
    public function index()
    {
        $this->load->view($this->views.'lista');
    }
    // --------------------------------------------------<-----------------

    /**
     * Muestra la vista principal de orden
     *
     * @return  Void
     */
    public function orden()
    {
        $data['orden'] = $this->{$this->model}->listar_orden();
foreach ($data['orden'] as $key => $orden) {
  $orden->estatusordenservicio = ($orden->estatusordenservicio == 1) ? 'Activo' : 'Inactivo';
  // code...
}
        $this->load->view($this->views.'orden',$data);
    }
    // -------------------------------------------------------------------
    /**
     * guardar una nueva orden de servicio
     *
     * @return  Void
     */
    public function guardar_orden_de_servicio()
    {
    if( !$data['cotizacion'] = $this->{$this->model}->obtener_cotizacion() )
        $this->alertas->info('orden/ordenr');

        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(

                array(
                    'field' => 'input_idservicio',
                    'label' => 'orden servicio',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_observaciones',
                    'label' => 'observaciones',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_idcotizacion',
                    'label' => 'idcotizacion',
                    'rules' => 'required|numeric'
                ),

                array(
                  'field' => 'input_Fecha',
                  'label' => 'Fecha',
                  'rules' => 'required'
                ),

            )
        );
  if( $this->form_validation->run() && $this->input->post() ){
       $data = array(
            'idordenservicio' 	=> $this->input->post('input_idservicio',TRUE),
            'observaciones' 	=> $this->input->post('input_observaciones',TRUE),
            'idcotizacion' => $this->input->post('input_idcotizacion',TRUE),
            'fechaprogramacion' => date('Y:m:d'),
            'estatusordenservicio' 	=>($this->input->post('input_sodservicio',TRUE) == 'on' ) ? 1 : 0,
        );
        $this->alertas->db($this->{$this->model}->guardar_orden_de_servicio($data),'orden/guardar_orden_de_servicio');
        }
  $data['ordenservicio'] = $this->{$this->model}->listar_orden();
        $this->load->view($this->views.'agregar_oreden',$data);
    }
    // ----------------------------------------------





    /**
     * Edita una orden de servicio
     * @param 	Int
     * @return  Void
     */
    public function editar_orden_de_servicio($id=NUL)
    {

        //Obtenemos la orden de servicio
        if( !$data['ordenservicio'] 	= $this->{$this->model}->obtener_orden($id) )
            $this->alertas->info('orden/editar_orden_de_servicio');

               //Obtenemos el cotizacion
               if( !$data['cotizacion'] = $this->{$this->model}->obtener_cotizacion() )
                   $this->alertas->info('orden/editar_orden_de_servicio');
        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(

                array(
                    'field' => 'input_idservicio',
                    'label' => 'orden servicio',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_observaciones',
                    'label' => 'observaciones',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_idcotizacion',
                    'label' => 'idcotizacion',
                    'rules' => 'required|numeric'
                ),

                array(
                  'field' => 'input_Fecha',
                  'label' => 'Fecha',
                  'rules' => 'required'
                ),

            )
        );
  if( $this->form_validation->run() && $this->input->post() ){
       $data = array(
            'Observaciones' 	=> $this->input->post('input_observaciones',TRUE),
            'idcotizacion' => $this->input->post('input_idcotizacion',TRUE),
            'fechaprogramacion' => date('Y:m:d'),
            'estatusordenservicio' 	=>($this->input->post('input_sodservicio',TRUE) == 'on' ) ? 1 : 0,
        );

  $this->alertas->db($this->{$this->model}->editar_orden_de_servicio($id,$data),'orden/orden');

        }

        $this->load->view($this->views.'editar_orden_de_servicio',$data);
    }
    // -------------------------------------------------------------------

        /**
         * Elimina un determinado producto
         *
         * @param 	Int
         * @return  Void
         */
        public function eliminar_orden($id=NULL)
        {
            $this->alertas->db($this->{$this->model}->eliminar_orden($id),'orden/orden');
        }
        // -------------------------------------------------------------------

        /**
         *PDF
         *
         */

    public function PDF_orden()
    {

        $this->load->library('fpdf');
        $this->pdf=new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','',12);

        $this->pdf->cell(350,4,utf8_decode('FOR-PT-300'),0,1,'C');
        $this->pdf->cell(335,4,utf8_decode('Ver:'),0,1,'C');
        $this->pdf->cell(340,4,utf8_decode('Pagina'),0,1,'C');
        $this->pdf->Ln();
        $this->pdf->Image('upload/img/imec.png',15,5,40);

        //Restauración de colores y fuentes
        $this->pdf->SetFillColor(193,188,199);
        $this->pdf->SetTextColor(0);
        $this->pdf->SetFont('');
        $fill=TRUE;

        $this->pdf->Cell(185,1,"",'LR',1,'L',$fill);
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Ln();
        $this->pdf->Ln();

        $this->pdf->Cell(185,5,"Reporte General de Servicio",'LR',1,'C',$fill);




        $this->pdf->SetY(50);
        $this->pdf->SetX(30);
        $this->pdf->cell(5,5,utf8_decode(''),1,0,'C');
        $this->pdf->cell(50,10,utf8_decode('Requerimiento adicional'),0,1,'C');

        $this->pdf->SetY(50);
        $this->pdf->SetX(130);
        $this->pdf->cell(50,4,utf8_decode('______________________'),0,1,'C');
        $this->pdf->SetY(55);
        $this->pdf->SetX(130);
        $this->pdf->cell(50,4,utf8_decode('______________________'),0,1,'C');



        $this->pdf->SetY(70);
        $this->pdf->SetX(30);
        $this->pdf->cell(5,5,utf8_decode(''),1,0,'C');
        $this->pdf->cell(30,10,utf8_decode('Observaciones'),0,1,'C');

        $this->pdf->SetY(70);
        $this->pdf->SetX(130);
        $this->pdf->cell(50,4,utf8_decode('_______________________'),0,1,'C');
        $this->pdf->SetY(75);
        $this->pdf->SetX(130);
        $this->pdf->cell(50,4,utf8_decode('_______________________'),0,1,'C');





        $this->pdf->SetY(90);
        $this->pdf->SetX(30);
        $this->pdf->cell(5,5,utf8_decode(''),1,0,'C');
        $this->pdf->cell(15,10,utf8_decode('Otros'),0,1,'C');

        $this->pdf->SetY(90);
        $this->pdf->SetX(130);
        $this->pdf->cell(50,4,utf8_decode('_________________________'),0,1,'C');
        $this->pdf->SetY(95);
        $this->pdf->SetX(130);
        $this->pdf->cell(50,4,utf8_decode('_________________________'),0,1,'C');


        $this->pdf->SetY(150);
        $this->pdf->SetX(30);
        $this->pdf->cell(15,10,utf8_decode('________________________'),0,1,'C');
        $this->pdf->cell(55,4,utf8_decode('Responzable del servicio'),0,1,'C');
        $this->pdf->cell(55,3,utf8_decode('Fecha y Firma'),0,1,'C');

        $this->pdf->SetY(150);
        $this->pdf->SetX(95);
        $this->pdf->cell(15,10,utf8_decode('________________________'),0,1,'C');
        $this->pdf->cell(185,4,utf8_decode('Agente de ventas'),0,1,'C');
        $this->pdf->cell(185,3,utf8_decode('Fecha y Firma'),0,1,'C');

        $this->pdf->SetY(150);
        $this->pdf->SetX(160);
        $this->pdf->cell(15,10,utf8_decode('________________________'),0,1,'C');
        $this->pdf->cell(320,4,utf8_decode('Agente de ventas'),0,1,'C');
        $this->pdf->cell(320,3,utf8_decode('Fecha y Firma'),0,1,'C');



        $this->pdf->Output();

    }



}
