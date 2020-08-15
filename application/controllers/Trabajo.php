<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de configuración del sistema
 * ------------------------------------------------------------------------
 *
 * Controlador que permite  visualizar, agregar, editar y eliminar areas de trabajo
 *
 * @author RQ1 
 *
 */
class Trabajo extends CI_Controller
{

    private $views = 'trabajo/';
    private $model = 'mareastrabajo';//nombre del modelo


    public function __construct()
    {
        parent::__construct();

        //Corremos modelo de base de datos
        $this->load->model($this->model);
    }
    /**
     * Muestra la vista principal para visualizar las àreas de trabajo agregadas
     *
     * @return  Void
     */
    public function trabajo()
    {
        $data['areas_trabajo'] = $this->{$this->model}->listar_areastrabajo();

        $this->load->view($this->views.'trabajo',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega areas de trabajo
     *
     * @return  Void
     */
    public function areas_agregar()
    {

        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_nombre',
                    'label' => 'Nombre',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'input_descripcion',
                    'label' => 'Descripcion',
                    'rules' => 'required',
                ),
                
            )
        );

        if( $this->form_validation->run() && $this->input->post() ){


            $data = array(
                'idarea'=> null,
                'nombrearea' => $this->input->post('input_nombre',TRUE),
                'descripcionarea' => $this->input->post('input_descripcion',TRUE),
                
            );

            $this->alertas->db($this->{$this->model}->gurdar_areastrabajo($data),'trabajo/trabajo/');
            
        }

        //Vista
        $data['areas_trabajo'] = $this->{$this->model}->listar_areastrabajo();
        $this->load->view($this->views.'agregar_trabajo');

    }

    
    // -------------------------------------------------------------------
    /**
     * Editar un area de trabajo
     *
     * @param   Int
     * @return  Void
     */
    public function areas_editar($id=NULL)
    {
        //Obtenemos el area a editar
        if( !$data['trabajo'] = $this->{$this->model}->obtener_areastrabajo($id) )
            $this->alertas->info('trabajo/trabajo');


        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_nombre',
                    'label' => 'Nombre',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_descripcion',
                    'label' => 'Descripcion',
                 ), 'rules' => 'required'
             
            )
        );

        if( $this->form_validation->run() && $this->input->post() ){

            //Obtenemos el area a editar
            if( !$trabajo = $this->{$this->model}->obtener_areastrabajo($id))
                $this->alertas->info('trabajo/trabajo/'.$trabajo->idarea);

            $data_update = array(
                'nombrearea' => $this->input->post('input_nombre',TRUE),
                'descripcionarea' => $this->input->post('input_descripcion',TRUE),
                
            );

           // $grupos = $this->input->post('input_grupos',TRUE);

            $this->alertas->db($this->{$this->model}->actualizar_areastrabajo($trabajo->idarea,$data_update),'trabajo/trabajo/'.$trabajo->idarea);

        }

      //vista

        $this->load->view($this->views.'editar_trabajo',$data);

    }

    /**
     * Elimina un determinado usuario del area de trabajo
     *
     * @param   Int
     * @return  Void
     */
    public function areas_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_areastrabajo($id),'trabajo/trabajo');
    }
    // -------------------------------------------------------------------
    public function prueba(){

 
        $this->load->Library('fpdf');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetFont('Arial','B',12);//tamaño de letra
        $this->pdf->Cell(20,15,utf8_decode('!Hola Mundo¡'),20,'C');
        $this->pdf->Ln(20);
        $this->pdf->Output();

    }
     


}
