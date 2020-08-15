<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de producto
 * ------------------------------------------------------------------------
 *
 * Modulo que permite agregar, editar y eliminar productos del catalogo
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Producto extends CI_Controller
{

    private $views = 'productos/';
    private $model = 'mproductos';


    public function __construct()
    {
        parent::__construct();

        //Corremos modelo de base de datos
        $this->load->model($this->model);
    }

    /**
     * Muestra la vista principal de producto con index
     *
     * @return  Void
     */
    public function index()
    {
        $data['productos'] = $this->{$this->model}->listar_productos();
        $this->load->view($this->views.'productos',$data);
    }
    //---------------------------------------------------------------------


    /**
     * Listado de productos
     *
     * @return  Void
     */
    public function productos()
    {
        $data['productos'] = $this->{$this->model}->listar_productos();
        //foreach ($data['productos'] as $key => $producto) {
            //$producto->ordencompra = $this->{$this->model}->obtener_ordencompra_productos($producto->idproducto);
        //}
        $this->load->view($this->views.'productos',$data);
    }
    // -------------------------------------------------------------------

    /**
     * Agrega una nuevo producto al catalogo
     *
     * @return  Void
     */

    public function agregar_productos()
    {
        //Obtenemos el proveedor
        if( !$data['proveedores'] = $this->{$this->model}->obtener_proveedores() )
            $this->alertas->info('producto/productos');


                // Validaciones de Formulario
                $this->form_validation->set_rules(
                    array(
                        array(
                            'field' => 'input_descriprod',
                            'label' => 'Descripcion del producto',
                            'rules' => 'required',
                        ),
                        array(
                            'field' => 'input_precio',
                            'label' => 'Precio',
                            'rules' => 'required|numeric'
                        ),
                        array(
                            'field' => 'proveedores',
                            'label' => 'Proveedor',
                            'rules' => 'required|numeric'
                        ),
                    )
                );

                if( $this->form_validation->run() && $this->input->post() ){

                    $data = array(
                        'idproducto' => null,
                        'descripcionproducto' => $this->input->post('input_descriprod',TRUE),
                        'preciounitario' 	=> $this->input->post('input_precio',TRUE),
                        'idproveedor' => $this->input->post('proveedores',TRUE),
                    );

                    //$ordencompra = $this->input->post('input_ordencompra',TRUE);
                    //$this->alertas->db($this->{$this->model}->guardar_productoordencompra($data, $ordencompra),'producto/productos');

                    $this->alertas->db($this->{$this->model}->guardar_producto($data),'producto/productos');
                }


        //$data['ordencompra'] = $this->{$this->model}->listar_ordenescompras();

        $this->load->view($this->views.'agregar_productos',$data);

    }
    // -------------------------------------------------------------------

    /**
     * Editar un producto del catalogo
     *
     * @param 	Int
     * @return  Void
     */
    public function editar_productos($id=NULL)
    {
        //Obtenemos el producto a editar
        if( !$data['productos'] = $this->{$this->model}->obtener_producto($id) )
            $this->alertas->info('producto/productos');

        //Obtenemos el proveedor
        if( !$data['proveedores'] = $this->{$this->model}->obtener_proveedores() )
            $this->alertas->info('producto/productos');

        //$data['productos']->ordencompra = $this->{$this->model}->obtener_ordencompra_productos($id);

        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_descriprod',
                    'label' => 'Descripcion del producto',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'input_precio',
                    'label' => 'Precio',
                    'rules' => 'required|numeric'
                ),
                array(
                    'field' => 'proveedores',
                    'label' => 'Proveedores',
                    'rules' => 'required|numeric'
                ),
            )
        );

        if( $this->form_validation->run() && $this->input->post() ){
            
            $data_update = array(
                'descripcionproducto' 	=> $this->input->post('input_descriprod',TRUE),
                'preciounitario' 	=> $this->input->post('input_precio',TRUE),
                'idproveedor' => $this->input->post('proveedores',TRUE),
            );

            //$ordencompra = $this->input->post('input_ordencompra',TRUE);
            //$this->alertas->db($this->{$this->model}->actualizar_productosordencompra($productos->idproducto,$data_update, $ordencompra),'producto/productos');

            $this->alertas->db($this->{$this->model}->actualizar_producto($id,$data_update),'producto/productos');

        }

        //$data['ordencompra'] = $this->{$this->model}->listar_ordenescompras();

        $this->load->view($this->views.'editar_productos',$data);

    }
    // -------------------------------------------------------------------

    /**
     * Elimina un determinado producto
     *
     * @param 	Int
     * @return  Void
     */
    public function productos_eliminar($id=NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_producto($id),'producto/productos');
    }
    // -------------------------------------------------------------------

}