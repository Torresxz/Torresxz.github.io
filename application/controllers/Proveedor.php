<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de proveedores
 * ------------------------------------------------------------------------
 *
 * Modulo que permite agregar, editar y eliminar proveedores del catalogo
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */

//Integrantes: Luis Fernando Juarez Flores, Maritza López Uscanga, Eduardo Zamora Lima, Lisset Serrano Aguilar,
//Patricia Hernandez Cruz

class Proveedor extends CI_Controller
{

    private $views = 'proveedores/';
    private $model = 'mproveedor';


    public function __construct()
    {
        parent::__construct();

        //Corremos modelo de base de datos
        $this->load->model($this->model);
    }

    /**
     * Muestra la vista principal de proveedor con index
     *
     * @return  Void
     */
    public function index()
    {
        $data['proveedores'] = $this->{$this->model}->listar_proveedores();
        $this->load->view($this->views . 'proveedores', $data);
    }
    //---------------------------------------------------------------------


    /**
     * Muestra la vista principal de proveedores
     *
     * @return  Void
     */
    public function proveedores()
    {
        $data['proveedores'] = $this->{$this->model}->listar_proveedores();//proveedor

        $this->load->view($this->views . 'proveedores', $data);
    }
    // -------------------------------------------------------------------

    /**
     * Agrega un nuevo proveedor
     *
     * @return  Void
     */
    public function agregar_proveedor()
    {

        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_nombre',
                    'label' => 'Nombre',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_rfc',
                    'label' => 'RFC',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_telefono',
                    'label' => 'Telefono',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_contacto',
                    'label' => 'Contacto',
                    'rules' => 'required'
                ),

                array(
                    'field' => 'input_email',
                    'label' => 'Correo electrónico',
                    'rules' => 'required|valid_email|is_unique[usuarios.email]',
                    'errors' => array(
                        'is_unique' => 'El correo electrónico ingresado ya esta en uso',
                    ),
                )
            )
        );

        if ($this->form_validation->run() && $this->input->post()) {

            $data = array(
                'idproveedor' => null,
                'proveedor' => $this->input->post('input_nombre', TRUE),
                'rfc' => $this->input->post('input_rfc', TRUE),
                'telefono' => $this->input->post('input_telefono', TRUE),
                'fax' => $this->input->post('input_fax', TRUE),
                'contacto' => $this->input->post('input_contacto', TRUE),
                'correo' => $this->input->post('input_email', TRUE),
            );


            $this->alertas->db($this->{$this->model}->gurdar_proveedor($data), 'proveedor/proveedores');
        }

        //Vista
//*/
        $this->load->view($this->views . 'agregar_proveedor.php');

    }
    // -------------------------------------------------------------------

    /**
     * Editar un proveedor
     *
     * @param Int
     * @return  Void
     */
    public function editar_proveedor($id = NULL)
    {
        //Obtenemos el usuario a editar
        if (!$data['proveedor'] = $this->{$this->model}->obtener_proveedor($id))
            $this->alertas->info('proveedor/proveedores');

        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_nombre',
                    'label' => 'Nombre',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_rfc',
                    'label' => 'RFC',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_telefono',
                    'label' => 'Telefono',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_contacto',
                    'label' => 'Contacto',
                    'rules' => 'required'
                ),

                array(
                    'field' => 'input_email',
                    'label' => 'Correo electrónico',
                    'rules' => 'required|valid_email|is_unique[usuarios.email]',
                    'errors' => array(
                        'is_unique' => 'El correo electrónico ingresado ya esta en uso',
                    ),
                )
            )
        );

        if ($this->form_validation->run() && $this->input->post()) {

            //Obtenemos el proveedor a editar
            if (!$proveedor = $this->{$this->model}->obtener_proveedor($id))
                $this->alertas->info('proveedor/proveedores/' . $proveedor->idproveedor);

            $data_update = array(
                'proveedor' => $this->input->post('input_nombre', TRUE),
                'rfc' => $this->input->post('input_rfc', TRUE),
                'telefono' => $this->input->post('input_telefono', TRUE),
                'fax' => $this->input->post('input_fax', TRUE),
                'contacto' => $this->input->post('input_contacto', TRUE),
                'correo' => $this->input->post('input_email', TRUE),
            );


            $this->alertas->db($this->{$this->model}->actualizar_proveedor($proveedor->idproveedor, $data_update), 'proveedor/proveedores/' . $proveedor->idproveedor);

        }

        //Vista

        $this->load->view($this->views . 'editar_proveedor', $data);

    }
    // -------------------------------------------------------------------
    /*

    */
    /**
     * Elimina un determinado proveedor
     *
     * @param Int
     * @return  Void
     */
    public function proveedores_eliminar($id = NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_proveedor($id), 'proveedor/proveedores');
    }
    // -------------------------------------------------------------------


    //--------------------------------------------------------------------- //pdf

    public function prueba()
    {

        $this->load->Library('FPDF');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(40, 10, utf8_decode('¡Hola, Mundo!'));
        $this->pdf->Output();
    }

    //Integrantes: Luis Fernando Juarez Flores, Maritza López Uscanga, Eduardo Zamora Lima, Lisset Serrano Aguilar,
    //Patricia Hernandez Cruz

    public function reporteproveedor()
    {
        //Realizamos la consulta
        if (!$proveedor = $this->{$this->model}->listar_proveedores())
            $this->alertas->info('proveedor/proveedores');

        //Cargamos la libreria PDF
        $this->load->Library('FPDF');
        $this->pdf = new FPDF('L', 'mm', 'A4');
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        //Encabezado

        $this->pdf->Image('upload/imec.png', 10, 10, 45);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(300, 27, 'LISTA DE PROVEEDORES LABORATORIOS', 0, 0, 'C');
        $this->pdf->Ln(21);
        $this->pdf->SetFillColor(255, 255, 255);
        $this->pdf->Cell(0, 1, '', 0, 1, 'L', true);

        //Tabla de proveedores
        $this->pdf->SetFont('Arial', 'B', 9);
        $this->pdf->Cell(10, 8, 'No', 1, 0, 'C', '1');
        $this->pdf->Cell(40, 8, 'PROVEEDOR', 1, 0, 'C', '1');
        $this->pdf->Cell(50, 8, 'DOMICILIO', 1, 0, 'C', '1');
        $this->pdf->Cell(50, 8, 'CONTACTO', 1, 0, 'C', '1');
        $this->pdf->Cell(42, 8, 'CORREO', 1, 0, 'C', '1');
        $this->pdf->Cell(28, 8, utf8_decode('TELEFÓNO'), 1, 0, 'C', '1');
        $this->pdf->Cell(32, 8, 'Servicios Ofrecidos', 1, 0, 'C', '1');
        $this->pdf->Cell(25, 8, utf8_decode('Acreditación'), 1, 0, 'C', '1');
        $this->pdf->Ln('8');

        //Extraer datos
        foreach ($proveedor as $key => $row) {
            $x=0;
            $s=0;
            $this->altura_campo($this->celdas($s+=1),8,10,$row->idproveedor);//8
            // devuelve la pocision del registro
            $x=$this->pdf->GetX();
            $this->altura_campo($this->celdas($s+=1),8,$x,utf8_decode($row->proveedor));
            // devuelve la pocision del registro
            $x=$this->pdf->GetX();
            $this->altura_campo($this->celdas($s+=1),8,$x,utf8_decode($row->contacto));
            // devuelve la pocision del registro
            $x=$this->pdf->GetX();
            $this->altura_campo($this->celdas($s+=1),8,$x,utf8_decode($row->contacto));
            // devuelve la pocision del registro
            $x=$this->pdf->GetX();
            $this->altura_campo($this->celdas($s+=1),8,$x,$row->correo);
            // devuelve la pocision del registro
            $x=$this->pdf->GetX();
            $this->altura_campo($this->celdas($s+=1),8,$x,$row->telefono);
            // devuelve la pocision del registro
            $x=$this->pdf->GetX();
            $this->altura_campo($this->celdas($s+=1),8,$x,'');
            // devuelve la pocision del registro
            $x=$this->pdf->GetX();
            $this->altura_campo($this->celdas($s+=1),8,$x,'');
            // devuelve la pocision del registro
            $x=$this->pdf->GetX();
            $this->pdf->Ln();

        }
        //Footer
        $this->pdf->SetY(-40);
        $this->pdf->SetFont('Arial','I',8);
        // Número de página
        $this->pdf->Cell(0,10,utf8_decode('Página:').$this->pdf->PageNo().'/{nb}',0,0,'C');

        $this->pdf->Output();
    }

    public function altura_campo($w,$h,$x,$t)
    {
        //Divide entre tres el alto del registro
        $height = $h / 3;
        //resultado para sumarle dos
        $first = $height + 2;
        $second = $height + $height + $height + 3;
        //obtener la logitud de la cadena $t
        $len = strlen($t);

        if ($len > 23) {
            $txt = str_split($t, 21);
            $this->pdf->SetX($x);
            $this->pdf->Cell($w, $first, $txt[0], '' . '', '');
            $this->pdf->SetX($x);
            $this->pdf->Cell($w, $second, $txt[1], '' . '', '');
            $this->pdf->SetX($x);
            $this->pdf->Cell($w, $h, '', 'LTRB', 0, 'L', 0);
        } else {
            $this->pdf->SetX($x);
            $this->pdf->Cell($w, $h, $t, 'LTRB', 0, 'L', 0);
        }
    }

    public function celdas($posicion){

        $valor=0;
        $numeros=array(8,10,40,50,50,42,28,32);
        for($i=0;$i<8;$i++){
            if($posicion==$i){
                $valor=$numeros[$i];
            }
        }
        return $valor;
    }
}

