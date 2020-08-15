<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de configuración de cotizacion
 * ------------------------------------------------------------------------
 *
 * Modulo que permite  generar cotización
 *
 * @author Fabrica de software / RQ3
 *
 */
class Cotizacion extends CI_Controller
{

    private $views = 'cotizacion/';
    private $model = 'mcotizacion';


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
        $this->load->view($this->views.'cotizacion');
    }
    // --------------------------------------------------<-----------------

    /**
     * Muestra la vista principal
     *
     * @return  Void
     */
    public function cotizacion()
    {
        $data['cotizacion'] = $this->{$this->model}->listar_cotizacion();
        $data['clientes'] = $this->{$this->model}->listar_clientes();

        $this->load->view($this->views.'cotizacion',$data);
    }
    // -------------------------------------------------------------------
    /**
     * Agrega una cotizacion nueva
     *
     * @return  Void
     */
    public function agregar_cotizacion()
    {
    	
        //Obtenemos cliente
        $data['clientes'] = $this->{$this->model}->listar_clientes();

                // Validaciones de Formulario
                $this->form_validation->set_rules(
                    array(
                        array(
                            'field' => 'input_fecha',
                            'label' => 'Fecha',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_clave',
                            'label' => 'Clave',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_cliente',
                            'label' => 'clientes',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_encargado',
                            'label' => 'encargados',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_subtotal',
                            'label' => 'Subtotal',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_entrega',
                            'label' => 'Tiempo de entrega',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_lugar',
                            'label' => 'Lugar de Servicio',
                            'rules' => 'required'
                        )
                    )
                );

                if( $this->input->post() ){
                    $uno = $this->{$this->model}->ultimo();
                    $val=$uno->Idcotizacion+1;

                    $data = array(
                        'Idcotizacion' =>$val,
                        'Fecha'     => date('Y:m:d'),
                        'clave'     => $this->input->post('input_clave',TRUE),
                        'idcliente'     => $this->input->post ('input_cliente',TRUE),
                        'Encargado_IdEncargado'     => $this->input->post('input_encargado',TRUE),
                        'subtotal' => $this->input->post('input_subtotal',TRUE),
                        'tiempoentrega' => $this->input->post('input_entrega',TRUE),
                        'lugarservicio' => $this->input->post('input_lugar',TRUE)
                    );

                    $this->alertas->db($this->{$this->model}->guardar_cotizacion($data),'cotizacion/Cotizacion');
                }

        $this->load->view($this->views.'Agregar_Cotizacion',$data);

    }
    // -------------------------------------------------------------------

  
    /**
     * Edita una cotizacion
     * @param   Int
     * @return  Void
     */
    public function editar_cotizacion($id=NULL)
    {

        //Obtenemos la cotizacion a editar
        if( !$data['cotizacion']  = $this->{$this->model}->obtener_cotizacion($id) )
            $this->alertas->info('cotizacion/cotizacion');

         //Obtenemos el cliente
        $data['clientes'] = $this->{$this->model}->listar_clientes();

        
        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_fecha',
                    'label' => 'Fecha',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'input_clave',
                    'label' => 'Clave',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'input_cliente',
                    'label' => 'Empresa',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'input_encargado',
                    'label' => 'Encargado',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'input_subtotal',
                    'label' => 'Subtotal',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'input_tiempo',
                    'label' => 'Tiempo de entrega',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_lugar',
                    'label' => 'Lugar de servicio',
                    'rules' => 'required'
                )
            )
        );

        if( $this->form_validation->run() && $this->input->post() ){

                    $data_update = array(
                        'Idcotizacion' => $id,
                        'Fecha' => $this->input->post('input_fecha',TRUE),
                        'clave'    => $this->input->post('input_clave',TRUE),
                        'idcliente' => $this->input->post('input_cliente',TRUE),
                        'Encargado_IdEncargado' => $this->input->post('input_encargado',TRUE),
                        'subtotal'    => $this->input->post('input_subtotal',TRUE),
                        'tiempoentrega'    => $this->input->post('input_tiempo',TRUE),
                        'lugarservicio'    => $this->input->post('input_lugar',TRUE),
                    );

                $this->alertas->db($this->{$this->model}->actualizar_cotizacion($id,$data_update),'cotizacion/cotizacion');
        }
        //Vista

        $this->load->view($this->views.'editar_cotizacion',$data);
    }
    // -------------------------------------------------------------------


    /**
     * Elimina un determinada cotizacion
     *
     * @param   Int
     * @return  Void
     */
    public function cotizacion_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_cotizacion($id),'cotizacion/cotizacion');
    }
    // -------------------------------------------------------------------

    /**
     * Documento en pdf de cotizacion
    */
    public function cotizacion_pdf($id=NULL){

        //Obtenemos la cotizacion
        $cotizar=$this->{$this->model}->obtener_cotizacion1($id);
        //Obtenemos el equipo de cotizacion
        $equipocotizacion=$this->{$this->model}->obtener_equipocotizacion($id);
        //Obtener el id del cliente en la tabla cotizacion
        foreach ($cotizar as $key =>$valor){
            $id_cliente=$valor->idcliente;
        }
        //Obtenemos cliente
        $clientes=$this->{$this->model}->obtener_clientes($id_cliente);
        //Obtenemos el equipo
        $equipos=$this->{$this->model}->obtener_equipocotizacion($id);
        //Listar clientes
        $data=$this->{$this->model}->listar_clientes();

        $this->load->Library('PDF');
        // crear
        $this->pdf = new FPDF(); 
        $this->pdf->AddPage();
         // Logo
        $this->pdf->Image('upload/imec.png',10,10,45);
        // Arial  9
        $this->pdf->SetFont('Arial','',9,'');
        // Movernos a la derecha
        $this->pdf->Cell(80);
        $this->pdf->Line(10,30,194,30);
        // datos
        $this->pdf->Cell(96,10,'Fecha: '.date('d-m-Y')."",0,0,'R');
        // Salto de línea
        $this->pdf->Ln(5);
        $this->pdf->Cell(156.5,10,utf8_decode('COT:') ,0,0,'R');
        $this->pdf->Ln(5);
        // Salto de línea
        $this->pdf->Cell(170,10,utf8_decode('No. Cotización') ,0,0,'R');
        // Salto de línea
        $this->pdf->Ln(8);
        // Arial bold 9
        $this->pdf->SetFont('Arial','B',9,'');
        $this->pdf->Cell(125,10,utf8_decode('Nombre Fiscal: Ignacio Grande Morales, R.F.C. GAMI760731HA8') ,0,0,'L');
        $this->pdf->Cell(70,10,utf8_decode('Acreditación 75284 PERRY JHONSON') ,0,0,'L');;

        // Salto de linea
         $this->pdf->Ln(7);
        // Arial bold 10
         $this->pdf->SetFont('Arial','',9);
        // Título
         $this->pdf->Cell(180,10,utf8_decode('COTIZACIÓN') ,0,0,'C');
        // Salto de línea
         $this->pdf->Ln(8);
         $this->pdf->SetFont('Arial','',10);
        // datos de cliente
         foreach ($clientes as $key => $cliente) { 
            $this->pdf->Cell(30,10,'Empresa: '.$cliente->empresa,'C');
            $this->pdf->Ln(5);
            $this->pdf->Cell(30,10,utf8_decode('Dirección: '.$cliente->direccion) ,'C');
            $this->pdf->Ln(5);
            $this->pdf->Cell(125.5,10,utf8_decode('Teléfono: '.$cliente->Telefono) ,'C');
            $this->pdf->Cell(30,10,utf8_decode('Ext: 1') ,'C');
            $this->pdf->Ln(5);
            $this->pdf->Cell(60,10,utf8_decode('Atención: '.$cliente->puestocontacto) ,'C');
            $this->pdf->Cell(90,10,utf8_decode('Puesto: '.$cliente->puestocontacto) ,0,0,'R');
            $this->pdf->Ln(5);
        }
        $this->pdf->Cell(30,10,utf8_decode('Correo electrónico: '.$cliente->correo) ,'C');
        $this->pdf->Ln(9);
        $this->pdf->Cell(30,10,utf8_decode('En atención a su amable solicitud, por medio de este coducto nos permitimos poner a su consideración la siguiente') ,'C');
        $this->pdf->Ln(4);
        $this->pdf->Cell(30,10,utf8_decode('cotización por servicio de CALIBRACIÓN de:') ,'C');
        $this->pdf->Ln(11);
        // encabezados de tabla
        $this->pdf->SetFont('Arial','',10);
        $this->pdf->Cell(10,7,'','T,R,L',0,'C');
        $this->pdf->Cell(10,7,'','T,R',0,'C');
        $this->pdf->Cell(15,7,'','T,R',0,'C');
        $this->pdf->Cell(13,7,'No.','T,B',0,'C');
        $this->pdf->Cell(103,7,'Descripcion ',1,0,'C');
        $this->pdf->Cell(20,7,'Precio','T',0,'C');
        $this->pdf->Cell(19,7,'','T,L,R',0,'C');
        $this->pdf->Ln();
        $this->pdf->Cell(10,7,'No.',',L',0,'C');
        $this->pdf->Cell(10,7,'Cant','L',0,'C');
        $this->pdf->Cell(15,7,'Metodo','R,L',0,'C');
        $this->pdf->Cell(13,7,'Pts','R',0,'C');
        $this->pdf->Cell(15,7,'Equipo','R',0,'C');
        $this->pdf->Cell(15,7,'Marca','R',0,'C');
        $this->pdf->Cell(15,7,'Modelo','R',0,'C');
        $this->pdf->Cell(15,7,'Alcance','R',0,'C');
        $this->pdf->Cell(18,7,'Ubicacion','R',0,'C');
        $this->pdf->Cell(25,7,'Identificacion','R',0,'C');
        $this->pdf->Cell(20,7,'Unitario','R',0,'C');
        $this->pdf->Cell(19,7,'Subtotal','R',0,'C');
          // Salto de linea
          $this->pdf->Ln();
          //Contador para obtener valor de cantidad
          $q=0;
          $no=1;
          $total=0;
        //datos de equipo
        foreach($equipos as $key=> $row){
            $s=0;
            $this->pdf->Cell($this->columnas_tabla($s),8,$no,1);
            $no++;
            $w=0;
            //Datos de equipo cotizacion
            foreach ($equipocotizacion as $key =>$valor){
                if($w==$q){
                // valor de la cantidad de la tabla equipocotizacion
                $can=$valor->catidad;
                }
                $w+=1;
            }// Inserta los datos en la tabla
            $this->pdf->Cell($this->columnas_tabla($s+=1),8,$can,1);
                // devuelve la pocision del registro
                $x=$this->pdf->GetX();
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->metodo);
                // devuelve la pocision del registro
                $x=$this->pdf->GetX();
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->nopartes);
                // devuelve la pocision del registro
                $x=$this->pdf->GetX();
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->equipo);
                // devuelve la pocision del registro
                $x=$this->pdf->GetX();
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->marca);
                // devuelve la pocision del registro
                $x=$this->pdf->GetX();
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->modelo);
                // devuelve la pocision del registro
                $x=$this->pdf->GetX();
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->alcance);
                // devuelve la pocision del registro
                $x=$this->pdf->GetX();
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->ubicacion);
                // devuelve la pocision del registro
                $x=$this->pdf->GetX();
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->identificacion);
                // devuelve la pocision del registro 
                $x=$this->pdf->GetX();
             $this->mycell($this->columnas_tabla($s+=1),8,$x,$row->precioUnitario); 
                $x=$this->pdf->GetX();
                //Calcula el total final
                $total+=$can*$row->precioUnitario;
                // Calcula el subtotal
            $this->mycell($this->columnas_tabla($s+=1),8,$x,$can*$row->precioUnitario);
            // Salto de linea
            $this->pdf->Ln();
            //Cotador No. en la tabla
            $q++;
        }
        // crea la última fila con el total de la cotización
            $this->pdf->Cell(151,8,'','R,T',0,'C'); 
            $this->pdf->Cell(20,8,'Total',1,0,'C'); 
                $x=$this->pdf->GetX();
            $this->mycell(19,8,$x,$total); 
            $this->pdf->Ln();
            $this->pdf->Ln(4);
            // datos de cotizacion
            foreach ($cotizar as $key => $dato) { 
                $this->pdf->Cell(73,5,utf8_decode('Atención de entrega: '.$dato->Fecha.' dias habiles') ,0,0,'C');
                $this->pdf->Cell(50,5,utf8_decode('Previa programacion'),0,0,'C' );
                $this->pdf->Cell(65,5,utf8_decode('Lugar del servicio: '.$dato->lugarservicio) ,0,0,'C');
                $this->pdf->Ln(8);
                $this->pdf->SetFont('Arial','B',9,'');
                $this->pdf->Cell(57,5,utf8_decode('Vigencia y alcance de la cotizacion') ,0,0,'C');
                $this->pdf->Ln(6);
                $this->pdf->SetFont('Arial','',9,'');
                $this->pdf->Cell(105,5,utf8_decode('* Vigencia de la cotización:  15 días a partir de la fecha de emisión. ') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(182,5,utf8_decode('* La presente cotización se generó en base a la internación proporcionada en su solitud de cotización. Diferencias de esta ') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(74.5,5,utf8_decode('con su pedido pueden modificar la cotización.') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(172,5,utf8_decode('* La cotización solamente ampara el servicio mencionado, en caso de requerir otro tipo de servicio, se cotizará por ') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(25,5,utf8_decode('separado. ') ,0,0,'C');
                //
                $this->pdf->Ln(8);
                $this->pdf->SetFont('Arial','B',9,'');
                $this->pdf->Cell(45,5,utf8_decode('Condiciones comerciales:  ') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->SetFont('Arial','',9,'');
                $this->pdf->Cell(105,5,utf8_decode('* Estos precios son en moneda nacional y no incluyen IVA (16%).  ') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(44,5,utf8_decode('* Condiciones de pago:') ,0,0,'C');
                $this->pdf->Cell(88,5,utf8_decode('Crédito de 30 días naturales ') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(166,5,utf8_decode('Condiciones de pago en suministros: 50% ANTICIPO Y 50% CONTRA ENTREGA Y/O AVISO DE ENVIÓ.
') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(167,5,utf8_decode('* El pagó debe efectuarse por medio de cheque o transferencia bancaria a nombre de Ignacio Grande Morales') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(37,5,utf8_decode('Banco: Banorte. ') ,0,0,'C');
                $this->pdf->Cell(161,5,utf8_decode('Clabe interbancaria: 072830008034054808') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(53,5,utf8_decode('No. de cuenta: 0803405480 ') ,0,0,'C');
                $this->pdf->Cell(141,5,utf8_decode('Sucursal: 2239 Tlaxcala Portal, plaza 9726 Tlaxcala') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(77,5,utf8_decode('electrónico a: contabilidad1@aimec.com.mx. ') ,0,0,'C');
                $this->pdf->Ln(10);
                $this->pdf->SetFont('Arial','B',9,'');
                $this->pdf->Cell(40,5,utf8_decode('Cláusulas del servicio: ') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->SetFont('Arial','',9,'');
                $this->pdf->Cell(40,5,utf8_decode('Adolfo López Mateos 1A') ,0,0,'C');
                $this->pdf->Cell(100,5,utf8_decode('') ,0,0,'C');
                $this->pdf->Cell(30,5,utf8_decode('www.aimec.com.mx') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(46,5,utf8_decode('Ocotlan Tlaxcala. CP. 90100') ,0,0,'C');
                $this->pdf->Cell(100,5,utf8_decode('') ,0,0,'C');
                $this->pdf->Cell(20,5,utf8_decode(' calidad@aimec.com.mx') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(37,5,utf8_decode('Tel (01246) 462.35.10 ') ,0,0,'C');
                $this->pdf->Cell(100,5,utf8_decode('') ,0,0,'C');
                $this->pdf->Cell(30,5,utf8_decode('venta2@aimex.com.mx') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(30,5,utf8_decode('Cel 246.180.5521') ,0,0,'C');
                $this->pdf->Cell(100,5,utf8_decode('') ,0,0,'C');
                $this->pdf->Ln(7);
                $this->pdf->Cell(140,5,utf8_decode('') ,0,0,'C');
                $this->pdf->Cell(50,5,utf8_decode('FOR-RP-0101') ,0,0,'C');
                $this->pdf->Ln();
                $this->pdf->Cell(140,5,utf8_decode('') ,0,0,'C');
                $this->pdf->Cell(50,5,utf8_decode('Ver. 05') ,0,0,'C');

                $this->pdf->Cell(50,5,utf8_decode('Ver. 05') ,0,0,'C');
            }
         
        $this->pdf->Output();    
}
// -------------------------------------------------------------------
    /**
     * Devolver el valor del tamaño de columna
     *
     */
    public function columnas_tabla($posicion){
        $valor=0;
        $numeros=array(10,10,15,13,15,15,15,15,18,25,20);
        for($i=0;$i<11;$i++){
            if($posicion==$i){
                $valor=$numeros[$i];
            }
        }
        return $valor;
    }
     // -------------------------------------------------------------------
    /**
     * Recibe el ancho del registro,alto, posición
     * de la tabla, cadena donde va el registro
     *
     */
    public function mycell($w,$h,$x,$t){
        //Divide entre tres el alto del registro
        $height=$h/3;
        //resultado para sumarle dos
        $first=$height+2;
        $second=$height+$height+$height+3;
        //obtener la logitud de la cadena $t
        $len=strlen($t);

        if($len>8){
            $txt=str_split($t,7);
            $this->pdf->SetX($x);
            $this->pdf->Cell($w,$first,$txt[0],''.'','');
            $this->pdf->SetX($x);
            $this->pdf->Cell($w,$second,$txt[1],''.'','');
            $this->pdf->SetX($x);
            $this->pdf->Cell($w,$h,'','LTRB',0,'L',0);
        }else{
            $this->pdf->SetX($x);
            $this->pdf->Cell($w,$h,$t,'LTRB',0,'L',0);
        }
    }
     // -------------------------------------------------------------------
    public function Holamundo(){

        $this->load->Library('PDF');
        $this->pdf = new FPDF();
        $this->pdf->AddPage();
        // Arial bold 16
        $this->pdf->SetFont('Arial','B',16);
        // Dato
        $this->pdf->Cell(30,10,utf8_decode('¡Hola, Mundo!') ,'C');
        $this->pdf->Output();
    }
// -------------------------------------------------------------------
}