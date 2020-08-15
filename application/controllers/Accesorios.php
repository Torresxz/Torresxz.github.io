<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de configuración del sistema
 * ------------------------------------------------------------------------
 *
 * Modulo que permite configurar y agregar los diferenets catálogos
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Accesorios extends CI_Controller
{

    private $views = 'Accesorios/';
    private $model = 'Maccesorios';


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
        $this->load->view($this->views.'Accesorios_agregar');
    }
    // --------------------------------------------------<-----------------

    /**
     * Muestra la vista principal
     *
     * @return  Void
     */
    public function Accesorios()
    {
        $data['accesorios'] = $this->{$this->model}->listar_Accesorios();

        foreach ($data ['accesorios'] as $key => $acce) {
            $acce ->statussalida= ($acce->statussalida == 1) ? 'Entregado': 'No entregado';
            // code...
          }
          $this->load->view($this->views.'Accesorios',$data);





    }
    // -------------------------------------------------------------------

    /**
     * Agrega un nuevo registro de accesorios
     *
     * @return  Void
     */
    public function Accesorios_agregar()
    {


                // Validaciones de Formulario
                $this->form_validation->set_rules(
                    array(
                        array(
                            'field' => 'input_idaccesorios',
                            'label' => 'Numero de accesorios',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_descripcionaccesorio',
                            'label' => 'Descripcion',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_hora',
                            'label' => 'Hora',
                            'rules' => 'required'
                        ),

                        array(
                            'field' => 'input_fechasalida',
                            'label' => 'Fecha',
                            'rules' => 'required'
                        )
                    )
                );

                if( $this->form_validation->run() && $this->input->post() ){


                    $data = array( ///nombre de columnas de las tablas
                        'idaccesorios' 	=>  NULL,
                        'descripcionaccesorio' 	=> $this->input->post('input_descripcionaccesorio',TRUE),
                        'hora' => $this->input->post('input_hora',TRUE),
                        'statussalida' => ($this->input->post('input_statussalida',TRUE) == 'on' ) ? 1 : 0,
                        'fechasalida' => $this->input->post('input_fechasalida',TRUE),

                    );
                    $this->alertas->db($this->{$this->model}->guardar_accesorios($data),'Accesorios/Accesorios'); //cambiarrrr
                }
                //Vista
              // $data['equ'] = $this->{$this->model}->listar_Accesorios();
        $this->load->view($this->views.'Accesorios_agregar');

    }
    // -------------------------------------------------------------------

    /**
     * editar un registro de accesorios
     *
     * @param 	Int
     * @return  Void
     */
    public function Accesorios_editar($id=NULL)
    {
        //Obtenemos el accesorio a editar
        if( !$data['accesorios'] = $this->{$this->model}->obtener_accesorio($id) )
            $this->alertas->info('Accesorios/Accesorios');


        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
              array(
                  'field' => 'input_descripcionaccesorio',
                  'label' => 'Descripcion',
                  'rules' => 'required'
              ),
              array(
                  'field' => 'input_hora',
                  'label' => 'Hora',
                  'rules' => 'required'
              ),

              array(
                  'field' => 'input_fechasalida',
                  'label' => 'Fecha',
                  'rules' => 'required'
              )
            )
        );

        if( $this->form_validation->run() && $this->input->post() ){
            $data_update = array( ///nombre de columnas de las tablas

              'descripcionaccesorio' 	=> $this->input->post('input_descripcionaccesorio',TRUE),
              'hora' => $this->input->post('input_hora',TRUE),
              'statussalida' => ($this->input->post('input_statussalida',TRUE) == 'on' ) ? 1 : 0,
              'fechasalida' => $this->input->post('input_fechasalida',TRUE),

            );
            $this->alertas->db($this->{$this->model}->actualizar_Accesorios($id,$data_update),'Accesorios/Accesorios');
        }
        $this->load->view($this->views.'Accesorios_editar',$data);


    }
    // -------------------------------------------------------------------
    /**
     * Elimina un determinado accesorio
     *
     * @param 	Int
     * @return  Void
     */
    public function Accesorios_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_Accesorios($id),'Accesorios/Accesorios');
    }
    // -------------------------------------------------------------------
    /**
    * ontener datos en pdf
    *
    * @param 	Int
    * @return  Void
    */
    public function reporte_accesorios(){

        //Realizamos la consulta
        if (!$accesorios = $this->{$this->model}->listar_Accesorios())
            $this->alertas->info('Accesorios/Accesorios');

        //Cargamos la libreria PDF
        $this->load->Library('FPDF');
        $this->pdf = new FPDF('L','mm','A4');
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        //Encabezado

        $this->pdf->Image('upload/imec.png',10,10,45);
        $this->pdf->SetFont('Arial','B',12);
        $this->pdf->Cell(230,30,'ACCESORIOS',0,0,'C');
        $this->pdf->Ln(7);
        $this->pdf->SetFont('Arial', '', 7);
        $this->pdf->Cell(385,27,utf8_decode('FOR-RR-0503'),0,0,'C');
        $this->pdf->Ln(5);
        $this->pdf->Cell(200, 27, utf8_decode('AÑO:2020'), 0, 0, 'R');
        $this->pdf->Ln(21);
        $this->pdf->SetFillColor(255,255,255);
        $this->pdf->Cell(0,1,'',0,1,'L',true);
        //Tabla de accesorios
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(15,7,'No',1,0,'C','1');

        $this->pdf->Cell(50,7,'Descripcion',1,0,'C','1');
        $this->pdf->Cell(50,7,'Hora',1,0,'C','1');
        $this->pdf->Cell(50,7,'Status',1,0,'C','1');
        $this->pdf->Cell(50,7,'Fecha',1,0,'C','1');
        $this->pdf->Ln('7');
        //Extraer datos
        foreach ($accesorios as $row) {
            // Se imprimen accesorios
            $this->pdf->SetFont('Arial', '', 7);
            $this->pdf->Cell(15,7,$row->idaccesorios, 1, 0, 'C', '');
            $this->pdf->Cell(50,7,utf8_decode($row->descripcionaccesorio), 1, 0, 'C', '');
            $this->pdf->Cell(50,7,utf8_decode($row->hora), 1, 0, 'C', '');
            $this->pdf->Cell(50, 7,utf8_decode($row->statussalida), 1, 0, 'C', '');
            $this->pdf->Cell(50,7,$row->fechasalida, 1, 0, 'C', '');
            $this->pdf->Ln('7');

        }
        $this->pdf->SetY(90);
        $this->pdf->Cell(90,12,utf8_decode('Elaboró:'),0,0,'C');
        $this->pdf->Cell(130,9.5,utf8_decode('Autorizó:'),0,0,'C');
        $this->pdf->Ln('7');
        $this->pdf->Cell(90,12,utf8_decode('C.Felipe Hernandez Durán'),0,0,'C');
        $this->pdf->Cell(130,9.5,utf8_decode('C.Gabriela Hernandez Durán'),0,0,'C');
        $this->pdf->Ln('7');

        //Footer
        $this->pdf->SetY(90);
        $this->pdf->SetFont('Arial','I',8);
        $this->pdf->Cell(400,27,'Page '.$this->pdf->PageNo().'/{nb}',0,0,'C');
        $this->pdf->Output();
   }

 


        public function obtener_pdf()
    {
        $this->load->library('fpdf');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));
        $this->pdf->Output();
    }

}

$this->SetLineWidth(123,234,34);
$this->SetFileColor(123,234,34);
$this->SetTextColor(123,234,34);
$this->SetDrawColor(123,234,34);
$this->Line(60, $this->GetY() + 10,158,  $this->GetY() + 10)