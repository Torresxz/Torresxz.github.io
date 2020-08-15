<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de configuración del sistema
 * ------------------------------------------------------------------------
 *
 * Modulo que permite configurar y agregar los diferenets catálogos
 *
 * @author Arturo Flores & Marilyn Vivaldo / Universidad Politécnica de Tlaxcala
 *
 */
class Recepcion extends CI_Controller
{
    private $views = 'recepcion/';
    private $model = 'Mrecepcion';

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
        $data['procesos'] = $this->{$this->model}->listar_recepcion();
        $this->load->view($this->views.'Procesos',$data);
    }
    // --------------------------------------------------<-----------------

    /**
     * Muestra la  lista de los procesos realizados
     *
     * @return  Void
     */
    public function procesos()
    {
        $data['procesos'] = $this->{$this->model}->listar_recepcion();
        $this->load->view($this->views.'Procesos',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega un nuevo registro de recepcion de procesos
     *
     * @return  Void
     */
    public function Procesos_agregar()
    {
        //Obtenemos el equipo de la orden de servicio
        if( !$data['equipoordenservicio'] = $this->{$this->model}->obtener_equipos()  )
            $this->alertas->info('Recepcion/procesos');
                // Validaciones de Formulario
                $this->form_validation->set_rules(
                    array(
                        array(
                            'field' => 'input_fecha',
                            'label' => 'Fecha',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_entrega',
                            'label' => 'Entrega',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'equipos',
                            'label' => 'Tipo de equipo',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'idorden',
                            'label' => 'orden de servicio',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_hora',
                            'label' => 'Hora',
                            'rules' => 'required'
                        )
                    )
                );
                if( $this->form_validation->run() && $this->input->post() ){
                    $data = array(
                        'idrecepcion' 	=>  null,
                        'fecha' 	=> $this->input->post('input_fecha',TRUE),
                        'entrega' => $this->input->post('input_entrega',TRUE),
                        'equipoordenservicio_idequipo' => $this->input->post('equipos',TRUE),
                        'equipoordenservicio_idordenservicio' => $this->input->post('idorden',TRUE),
                        'hora' => $this->input->post('input_hora',TRUE),
                    );
                    $this->alertas->db($this->{$this->model}->guardar_procesos($data),'Recepcion/procesos');
                }
        $this->load->view($this->views.'agregar_proceso',$data);

    }
    // -------------------------------------------------------------------
    /**
     * Editar un proceso mediante un id especifico
     *
     * @param 	Int
     * @return  Void
     */
    public function procesos_editar($id=NULL)
    {
        //Obtenemos todos los procesos
        if( !$data['recepcion'] = $this->{$this->model}->obtener_procesos($id) )
            $this->alertas->info('Recepcion/procesos');
        //obtenemos los equipos de orden de servicio
        if( !$data['equipoordenservicio'] = $this->{$this->model}->obtener_equipos() )
                $this->alertas->info('Recepcion/procesos');
        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_fecha',
                    'label' => 'Fecha',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_entrega',
                    'label' => 'Entrega',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'equipos',
                    'label' => 'Tipo de equipo',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'idorden',
                    'label' => 'orden de servicio',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_hora',
                    'label' => 'Hora',
                    'rules' => 'required'
                )
            )
        );
        if( $this->form_validation->run() && $this->input->post() ){
            $data_update = array(
                'fecha' 	=> $this->input->post('input_fecha',TRUE),
                'entrega' => $this->input->post('input_entrega',TRUE),
                'equipoordenservicio_idequipo' => $this->input->post('equipos',TRUE),
                'equipoordenservicio_idordenservicio' => $this->input->post('idorden',TRUE),
                'hora' => $this->input->post('input_hora',TRUE),
            );
            $this->alertas->db($this->{$this->model}->actualizar_procesos($id,$data_update),'Recepcion/procesos');
        }
        $this->load->view($this->views.'editar_proceso',$data);

    }
    // -------------------------------------------------------------------
    /**
     * Elimina un determinado proceso
     *
     * @param 	Int
     * @return  Void
     */
    public function procesos_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_procesos($id),'Recepcion/procesos');
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
