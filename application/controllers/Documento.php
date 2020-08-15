<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**------------------------------------------------------------------------
 * Modulo de configuración del archivo
 * ------------------------------------------------------------------------
 * Modulo que permite modificar, eliminar y agregar los diferentes archivos
 * @author RQ7 David/Nazareth/Ricardo
 */
class Documento extends CI_Controller
{

    private $views = 'documento/';
    private $model = 'Mdocumento';
    //---------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();

        //corremos librerias upload
        $config = array();
        $config['upload_path'] = 'upload/documento';
        $config['allowed_types'] = 'xlsx|XLSX';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config, 'AD');
        $this->AD->initialize($config);

        //Corremos modelo de base de datos
        $this->load->model($this->model);
    }
    //---------------------------------------------------------------------

    /**
     * Muestra la vista principal
     *
     * @return  Void
     */
    public function index()
    {
        $data['documento'] = $this->{$this->model}->listar_documento();
        $this->load->view($this->views.'documento',$data);
    }
    //---------------------------------------------------------------------

    //funcion que permite listar los documentos
    public function listar_documento()
    {

        $data['documento'] = $this->{$this->model}->listar_documento();
        $this->load->view($this->views.'listar_documento',$data);
    }
    //---------------------------------------------------------------------

    //funcion que permite agregar documentos
    public function agregar_documento()
    {
        //obtenemos orden servicio
        if (!$data['orden'] = $this->{$this->model}->obtener_orden())
            $this->alertas->info('documento');

        //obtenemos equipo patron
        if (!$data['equipo'] = $this->{$this->model}->obtener_equipo())
            $this->alertas->info('documento');


        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_nom',
                    'label' => 'Nombre del Documento',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'input_desc',
                    'label' => 'Descripción',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'userfile',
                    'label' => 'Archivo',
                    'rules' => ''
                ),
                array(
                    'field' => 'input_ord',
                    'label' => 'Orden Servicio',
                    'rules' => 'numeric'
                ),
                array(
                    'field' => 'input_pat',
                    'label' => 'Equipo patron',
                    'rules' => 'numeric'
                )

            )
        );

        if ($this->form_validation->run() && $this->input->post()) {

            //validacion
            if ( $this->AD->do_upload('userfile')==FALSE){
                $this->alertas->danger('documento', $this->AD->display_errors());
            }
            $info_AD = $this->AD->data();

            $data = array(
                'idarchivo' => null,
                'Nombre' => $this->input->post('input_nom', TRUE),
                'Descripcion' => $this->input->post('input_desc', TRUE),
                'URL' => $info_AD['file_name'],
                'idordenservicio' => $this->input->post('input_ord',TRUE),
                'idequipopatron' => $this->input->post('input_pat',TRUE),
            );


            $this->alertas->db($this->{$this->model}->guardar_archivo($data), 'documento');

        }
        $this->load->view($this->views.'agregar_documento',$data);

    }
    //---------------------------------------------------------------------

    //funcion que permite editar los documentos
    public function editar_documento($id=NULL)
    {
        //obtenemos documento
        if (!$data['archivo'] = $this->{$this->model}->obtener_documento($id))
            $this->alertas->info('documento');

        //obtenemos orden servicio
        if (!$data['orden'] = $this->{$this->model}->obtener_orden())
            $this->alertas->info('documento');

        //obtenemos equipo patron
        if (!$data['equipo'] = $this->{$this->model}->obtener_equipo())
            $this->alertas->info('documento');

        if ($this->input->post()){
            $banner_status = FALSE;

            //validacion form data
            if ($_FILES['userfile']['name'] != "" && $_FILES['userfile']['name'] != NULL){
                if (!$this->AD->do_upload('userfile'))
                    $this->alertas->danger($this->views . 'archivo', $this->AD->display_errors());

                if (file_exists( 'upload/documento/' . $data['archivo']->userfile))
                    unlink('upload/documento/' . $data['archivo']->userfile);

                $banner_status=true;
                $info_banner = $this->AD->data();
            }

            $data_update = array(
                'Nombre' => $this->input->post('input_nom', TRUE),
                'Descripcion' => $this->input->post('input_desc', TRUE),
                'idordenservicio' => $this->input->post('input_ord',TRUE),
                'idequipopatron' => $this->input->post('input_pat',TRUE),
            );

            if ($banner_status)
                $data_update['URL'] = $info_banner['file_name'];


            $this->alertas->db($this->{$this->model}->actualizar_archivo($id,$data_update), 'documento');
        }
        $this->load->view($this->views.'editar_documento',$data);

    }
    //---------------------------------------------------------------------

    //funcion que permite eliminar los documentos
    public function documento_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_archivo($id),'documento');
    }
    //---------------------------------------------------------------------

    public function prueba(){

        $this->load->Library('PDF');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
        $this->pdf->Output();
    }


    public function archivosBit(){
        if (!$Documento = $this->{$this->model}->listar_documento())
            $this->alertas->info('Documento/Documentos');

        $this->load->Library('fpdf');
        $this->pdf = new FPDF('L','mm','A4');
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->Image('upload/imec.png',10,10,45);
        $this->pdf->Line(15,30,290,30);
        $this->pdf->Line(15,181,290,181);
        $this->pdf->Ln(21);
        //slto de linea
        $this->pdf->SetFont('Arial','B',16);
        //tamaño de letra
        $this->pdf->Cell(95);
        $this->pdf->Cell(20,15,utf8_decode('Lista de documentos'),20,'C');
        $this->pdf->Ln(20);

        $this->pdf->SetFont('Arial', '',9);
        $this->pdf->SetFillColor(224,235,255);//para darle color a los titulos
        $this->pdf->Cell(7,10,'No',1,0,'C',1);
        $this->pdf->Cell(90,10,utf8_decode('Nombre'),1,0,'C',1);
        $this->pdf->Cell(25,10,utf8_decode('Descripción'),1,0,'C',1);
        $this->pdf->Cell(20,10,'URL',1,0,'C',1);
        $this->pdf->Cell(20,10,'Orden de servicio',1,0,'C',1);
        $this->pdf->Cell(45,10,utf8_decode('Equipo Patrón'),1,0,'C',1);
        $this->pdf->Ln();

        //Extraer datos
        $x=1;
        foreach ($Documento as $row) {
            $this->pdf->SetFont('Arial','',8);
            $this->pdf->Cell(7,10,$row->idarchivo, 1, 0, 'C', '');
            $this->pdf->Cell(90,10,utf8_decode($row->Nombre), 1, 0, 'C');
            $this->pdf->Cell(25,10,utf8_decode($row->Descripcion), 1, 0, 'C');
            $this->pdf->Cell(20,10,utf8_decode($row->URL), 1, 0, 'C');
            $this->pdf->Cell(20,10,utf8_decode($row->idordenservicio), 1, 0, 'C');
            $this->pdf->Cell(45,10,utf8_decode($row->idequipopatron), 1, 0, 'C');
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
