<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de configuración del sistema
 * ------------------------------------------------------------------------
 *
 * Modulo que permite configurar y agregar los diferenets catálogos
 *
 * @author Marilyn Vivaldo & Arturo Flores / Universidad Politécnica de Tlaxcala
 *
 */
class Transaccion extends CI_Controller
{
    private $views = 'transaccion/';
    private $model = 'Mtransaccion';

    public function __construct()
    {
        parent::__construct();
        $this->load->model($this->model);
    }

    /**
     * Muestra la vista principal
     *
     * @return  Void
     */
    public function index()
    {
        $data['transaccion'] = $this->{$this->model}->listar_transaccion();
        foreach ($data['transaccion'] as $key => $confirmacion){
            $confirmacion->Confirmacion = ($confirmacion->Confirmacion == 1) ? 'Aprobada' : 'No-Aprobada';
        }
        $this->load->view($this->views.'transacciones',$data);
    }
    // --------------------------------------------------<-----------------
    /**
     * Muestra la lista de las transacciones existentes
     *
     * @return  Void
     */
    public function transacciones()
    {
        $data['transaccion'] = $this->{$this->model}->listar_transaccion();
        foreach ($data['transaccion'] as $key => $confirmacion){
            $confirmacion->Confirmacion = ($confirmacion->Confirmacion == 1) ? 'Aprobada' : 'No-Aprobada';
        }
        $this->load->view($this->views.'transacciones',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega un nuevo registro de la transaccion de los procesos
     *
     * @return  Void
     */
    public function agregar()
    {
        //Obtenemos las areas de trabajo que envian
        if( !$data['areas_envia'] = $this->{$this->model}->obtener_areaenvia()  )
            $this->alertas->info('Transaccion/transacciones');
        //Obtenemos las areas de trabajo de destino
        if( !$data['areas_destino'] = $this->{$this->model}->obtener_areasdestino()  )
            $this->alertas->info('Transaccion/transacciones');
        //Obtenemos la orden de servicio
        if( !$data['ordenservicio'] = $this->{$this->model}->obtener_ordenservicio()  )
            $this->alertas->info('Transaccion/transacciones');
        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_fecha',
                    'label' => 'Fecha',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_hora',
                    'label' => 'Hora de entrega',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'areaenvia',
                    'label' => 'Area',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'orden',
                    'label' => 'Orden de servicio',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'areadestino',
                    'label' => 'Area de destino',
                    'rules' => 'required'
                )
            )
        );
        if( $this->form_validation->run() && $this->input->post() ){
            $data = array(
                'Id_transaccion' 	=>  null,
                'Fecha_entrega' 	=> $this->input->post('input_fecha',TRUE),
                'Hora_entrega' => $this->input->post('input_hora',TRUE),
                'Confirmacion' 	=> ($this->input->post('input_con',TRUE) == 'on' ) ? 1 : 0,
                'idareaenvia' => $this->input->post('areaenvia',TRUE),
                'idordenservicio' => $this->input->post('orden',TRUE),
                'idareadestino' => $this->input->post('areadestino',TRUE),
            );
            $this->alertas->db($this->{$this->model}->guardar_transaccion($data),'Transaccion/transacciones');
        }
        $this->load->view($this->views.'agregar_transaccion',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Editar un registro de una transaccion con un id especifico
     *
     * @param 	Int
     * @return  Void
     */
    public function editar($id=NULL)
    {
        //Obtenemos todas las transacciones dependiendo del id especifico
        if( !$data['transaccion_proceso'] = $this->{$this->model}->obtener_transaccion($id)  )
            $this->alertas->info('Transaccion/transacciones');
        //Obtenemos las areas de trabajo
        if( !$data['areas_trabajo'] = $this->{$this->model}->obtener_areaenvia()  )
            $this->alertas->info('Transaccion/transacciones');
        //Obtenemos las ordenes de servicio
        if( !$data['ordenservicio'] = $this->{$this->model}->obtener_ordenservicio()  )
            $this->alertas->info('Transaccion/transacciones');
        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_fecha',
                    'label' => 'Fecha',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_hora',
                    'label' => 'Hora de entrega',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_con',
                    'label' => ' Confirmación',
                    'rules' => ''
                ),
                array(
                    'field' => 'areaenvia',
                    'label' => 'Area',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'orden_id',
                    'label' => 'Orden de servicios',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'areadestino',
                    'label' => 'Area de destino',
                    'rules' => 'required'
                )
            )
        );
        if( $this->form_validation->run() && $this->input->post() ){
            $data_update = array(
                'Fecha_entrega' 	=> $this->input->post('input_fecha',TRUE),
                'Hora_entrega' => $this->input->post('input_hora',TRUE),
                'Confirmacion' 	=> ($this->input->post('input_con',TRUE) == 'on' ) ? 1 : 0,
                'idareaenvia' => $this->input->post('areaenvia',TRUE),
                'idordenservicio' => $this->input->post('orden_id',TRUE),
                'idareadestino' => $this->input->post('areadestino',TRUE),
            );
            $this->alertas->db($this->{$this->model}->actualizar_transaccion($id,$data_update),'Transaccion/transacciones');
        }
        $this->load->view($this->views.'editar_transaccion',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Elimina una determinada transaccion mediante un id especifico
     *
     * @param 	Int
     * @return  Void
     */
    public function eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_transaccion($id),'Transaccion/transacciones');
    }
    // -------------------------------------------------------------------
    public function prueba()
    {
        $this->load->library('fpdf');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(40, 10,utf8_decode('¡Hola Mundo!'));
        $this->pdf->Output();
    }


}


