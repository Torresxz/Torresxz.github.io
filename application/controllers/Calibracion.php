<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de Equipos Patron
 * ------------------------------------------------------------------------
 *
 * Modulo que permite configurar y agregar los diferentes equipos patron
 *
 * @author  Universidad Politécnica de Tlaxcala
 *
 */
class Calibracion extends CI_Controller
{

    private $views = 'calibracion/';
    private $model = 'MCalibracion';

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

    public function index()
    {
        $this->load->view($this->views.'lista');
    }
    // --------------------------------------------------<-----------------
     */

    /**
     * Muestra la vista principal
     *
     * @return  Void
     */
    public function hcalibracion()
    {
        $data['Calibracion'] = $this->{$this->model}->listar_historial_calibracion();
        $this->load->view($this->views.'Calibracion',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega una historial de calibracion
     *
     * @return  Void
     */
    public function guardar_historial_calibracion()
    {
        if( !$data['equipospatron'] = $this->{$this->model}->obtener_equipo() )
            $this->alertas->info('Calibracion/Calibracion');

        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(

                array(
                    'field' => 'input_idfecha',
                    'label' => 'Fecha',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_Fechain',
                    'label' => 'Fechain',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_Fechafin',
                    'label' => 'Fechafin',
                    'rules' => 'required'
                ),

                array(
                    'field' => 'input_hora',
                    'label' => 'Hora',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_idequipopatron',
                    'label' => 'equipopatron',
                    'rules' => 'required'

                )
            )
        );
        if( $this->form_validation->run() && $this->input->post() ){
            $data = array(
                'id_FechaC' 	=> $this->input->post('input_idfecha',TRUE),
                'Fecha_incial'     => date('Y:m:d'),
                'Fecha_Final' => date('Y:m:d'),
                'Hora' => Time('h:m:s'),
                //'estatusordenservicio' 	=>'1',
                'idequipopatron' 	=> $this->input->post('input_idequipopatron',TRUE),
            );
            $this->alertas->db($this->{$this->model}->guardar_historial_calibracion($data),'Calibracion/guardar_historial_calibracion');
        }
        $data['historialcalibracion'] = $this->{$this->model}->listar_historial_calibracion();
        $this->load->view($this->views.'Agregar_historial_de_calibracion',$data);
    }
    // ----------------------------------------------
    /**
     * Edita historial de calibracion
     * @param 	Int
     * @return  Void
     */
    public function Editar_historial_de_calibracion($id=NULL)
    {

        //Obtenemos la orden de servicio
        if( !$data['Calibracion'] 	= $this->{$this->model}->obtener_historial($id) )
            $this->alertas->info('Calibracion/Editar_historial_de_calibracion');

        //Obtenemos el cotizacion
        if( !$data['equipospatron'] = $this->{$this->model}->obtener_equipo() )
            $this->alertas->info('orden/Editar_historial_de_calibracion');
        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(

                array(
                    'field' => 'input_idfecha',
                    'label' => 'Fecha',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_Fechain',
                    'label' => 'Fechain',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_Fechafin',
                    'label' => 'Fechafin',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_hora',
                    'label' => 'Hora',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_idequipopatron',
                    'label' => 'equipopatron',
                    'rules' => 'required'

                )
            )
        );
        if( $this->form_validation->run() && $this->input->post() ){
            $data = array(
                'id_FechaC' 	=> $this->input->post('input_idfecha',TRUE),
                'Fecha_incial'     => $this->input->post('input_Fechain',TRUE),
                'Fecha_Final' => $this->input->post('input_Fechafin',TRUE),
                'Hora' => Time('h:m:s'),
                //'estatusordenservicio' 	=>'1',
                'idequipopatron' 	=>$this->input->post('input_idequipopatron',TRUE),
            );
            /*$data = array(
               'idordenservicio' 	=> '2',
               'observaciones' 	=> 'observaciones',
               'idcotizacion' => '1',
               'fechaprogramacion' => '12:2:2020',
               'estatusordenservicio' 	=>'1',
           );
            */         // $this->alertas->db($this->{$this->model}->editar_orden_de_servicio($data),'orden/orden');
            $this->alertas->db($this->{$this->model}->editar_historial_de_calibracion($id,$data),'Calibracion/hcalibracion');

        }
        //  $data['ordenservicio'] = $this->{$this->model}->listar_orden();
        $this->load->view($this->views.'Editar_historial_de_calibracion',$data);
    }
    // -------------------------------------------------------------------

    /**
     * Elimina un determinado historial de calibracion
     *
     * @param 	Int
     * @return  Void
     */
    public function eliminar_calibracion($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_calibracion($id),'Calibracion/hcalibracion');
    }
    // -------------------------------------------------------------------

    /**
     * Muestra la vista principal
     *
     * @return  Void
     */
    public function index()
    {
        $this->load->view($this->views.'agregar_instrumento');
    }
    // --------------------------------------------------<-----------------

    /**
     * Muestra la vista principal de listar
     *
     * @return  Void
     */
    public function Calibraciones()
    {
        $data['equipospatron'] = $this->{$this->model}->listar_equipospatron();

        $this->load->view($this->views.'listar_equipospatron',$data);
    }
    // -------------------------------------------------------------------

    /**
     * Editar una calibracion
     *
     * @param 	Int
     * @return  Void
     */ //Modificados
    public function calibracion_editar($id=NULL)
    {
        //Obtenemos el usuario a editar                         Funcion de mi modelo
        if( !$data['equipospatron'] 	= $this->{$this->model}->obtener_calibracion($id) )
            $this->alertas->info('Calibracion/Calibraciones');



        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_descripcion',
                    'label' => 'Descripcion del instrumento',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_alcance',
                    'label' => 'Alcance',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_marca',
                    'label' => 'Marca del instrumento',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_modelo',
                    'label' => 'Modelo del instrumento',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_serie',
                    'label' => 'Serie',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_informe',
                    'label' => 'Informe del instrumento',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_insertidumbre',
                    'label' => 'Insertidumbre',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_vencimiento',
                    'label' => 'Fecha de vencimiento',
                    'rules' => 'required'
                )
            )
        );

        if( $this->form_validation->run() && $this->input->post() ){

            //Nombres de mis campos de mi tabla
            //Actualizar: no se poner idequipoatron
            $data_update = array(
                'e_descripcion' 	=> $this->input->post('input_descripcion',TRUE),
                'e_alcance' => $this->input->post('input_alcance',TRUE),
                'e_marca' 	=> $this->input->post('input_marca',TRUE),
                'e_modelo' 	=> $this->input->post('input_modelo',TRUE),
                'e_serie'  => $this->input->post('input_serie',TRUE),
                'e_informe'  => $this->input->post('input_informe',TRUE),
                'e_insertidumbre'  => $this->input->post('input_insertidumbre',TRUE),
                'e_vence'  => $this->input->post('input_vencimiento',TRUE),


            );
            //Poner la vista de listar despues de /
            $this->alertas->db($this->{$this->model}->actualizar_calibracion($id,$data_update),'Calibracion/Calibraciones');

        }

        $this->load->view($this->views.'editar_equipospatron',$data);

    }

    // -------------------------------------------------------------------
    /**
     * Agrega un nuevo registro de recepcion de procesos
     *
     * @return  Void
     */
    public function agregar_instrumento()
    {


        // Validaciones de Formulario, no lleva el id principal
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_descripcion',
                    'label' => 'Descripcion del instrumento',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_alcance',
                    'label' => 'Alcance',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_marca',
                    'label' => 'Marca del instrumento',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_modelo',
                    'label' => 'Modelo del instrumento',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_serie',
                    'label' => 'Serie',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_informe',
                    'label' => 'Informe del instrumento',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_insertidumbre',
                    'label' => 'Insertidumbre',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_vencimiento',
                    'label' => 'Fecha de vencimiento',
                    'rules' => 'required'
                )
            )
        );

        if( $this->form_validation->run() && $this->input->post() ){
            $data = array( ///nombre de columnas de las tablas
                'idequipopatron'    =>  null,
                'e_descripcion'     => $this->input->post('input_descripcion',TRUE),
                'e_alcance' => $this->input->post('input_alcance',TRUE),
                'e_marca'   => $this->input->post('input_marca',TRUE),
                'e_modelo'  => $this->input->post('input_modelo',TRUE),
                'e_serie'  => $this->input->post('input_serie',TRUE),
                'e_informe'  => $this->input->post('input_informe',TRUE),
                'e_insertidumbre'  => $this->input->post('input_insertidumbre',TRUE),
                'e_vence'  => $this->input->post('input_vencimiento',TRUE),

            );
            $this->alertas->db($this->{$this->model}->guardar_calibracion($data),'Calibracion/Calibraciones');
        }
        $this->load->view($this->views.'agregar_instrumento');

    }
    // -------------------------------------------------------------------
    /**
     * Funcion que elimina un registro de la bd
     *
     * @param   Int
     * @return  Void
     */
    public function calibracion_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_calibracion($id),'Calibracion/Calibraciones');
    }
    // -------------------------------------------------------------------


    public function PDF(){

        $this->load->Library('PDF');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(40,10,utf8_decode('¡Que onda!'));
        $this->pdf->Output();
    }
    // -------------------------------------------------------------------
    public function Bitacora_equipos_patron(){
        if (!$Calibracion = $this->{$this->model}->listar_equipospatron())
            $this->alertas->info('Calibracion/Calibraciones');

        $this->load->Library('fpdf');
        $this->pdf = new FPDF('L','mm','A4');
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->Image('upload/imec.png',10,10,45);
        $this->pdf->Line(15,30,290,30);//para la linea de encabezado
        $this->pdf->Line(15,181,290,181);//para la linea de encabezado
        $this->pdf->Ln(21);//salto de linea
        $this->pdf->SetFont('Arial','B',12);//tamaño de letra
        $this->pdf->Cell(95);//mover a la derecha
        $this->pdf->Cell(20,15,utf8_decode('BITÁCORA DE EQUIPOS PATRÓN'),20,'C');
        $this->pdf->Ln(20);

        $this->pdf->SetFont('Arial', '',9);
        $this->pdf->SetFillColor(224,235,255);//para darle color a los titulos
        $this->pdf->Cell(7,10,'No',1,0,'C',1);
        $this->pdf->Cell(90,10,utf8_decode('Descripción'),1,0,'C',1);
        $this->pdf->Cell(25,10,'Alcance',1,0,'C',1);
        $this->pdf->Cell(20,10,'Marca',1,0,'C',1);
        $this->pdf->Cell(20,10,'Serie',1,0,'C',1);
        $this->pdf->Cell(45,10,utf8_decode('Informe'),1,0,'C',1);
        $this->pdf->Cell(35,10,'Insertidumbre',1,0,'C',1);
        $this->pdf->Cell(30,10,'Fecha de vencimiento',1,0,'C',1);
        $this->pdf->Ln();

        //Extraer datos
        $x=1;
        foreach ($Calibracion as $row) {
            // Se imprimen los equipos de patron
            $this->pdf->SetFont('Arial','',8);
            $this->pdf->Cell(7,10,$row->idequipopatron, 1, 0, 'C', '');
            $this->pdf->Cell(90,10,utf8_decode($row->e_descripcion), 1, 0, 'C');
            $this->pdf->Cell(25,10,utf8_decode($row->e_alcance), 1, 0, 'C');
            $this->pdf->Cell(20,10,utf8_decode($row->e_marca), 1, 0, 'C');
            $this->pdf->Cell(20,10,utf8_decode($row->e_serie), 1, 0, 'C');
            $this->pdf->Cell(45,10,utf8_decode($row->e_informe), 1, 0, 'C');
            $this->pdf->Cell(35,10,utf8_decode($row->e_insertidumbre), 1, 0, 'C');
            $this->pdf->Cell(30,10,$row->e_vence, 1, 0, 'C');
            $this->pdf->Ln( );
        }
        //Footer para pie de página
        $this->pdf->SetY(-30.1);
        $this->pdf->SetFont('Arial','I',7);
        // Número de página
        $this->pdf->Cell(0,10,utf8_decode('Versión: 01 '),0,0,'C');
        $this->pdf->Cell(0,10,utf8_decode('Página').$this->pdf->PageNo().'de{nb}',0,0,'R');


        $this->pdf->Output();
    }

}
