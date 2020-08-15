<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modulo de servicio
 * ------------------------------------------------------------------------
 *
 * Modulo que permite agregar, editar y eliminar servicios del catalogo
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Servicio extends CI_Controller
{

    private $views = 'servicio/';
    private $model = 'msistema';


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
        $this->load->view($this->views . 'lista');
    }
    // --------------------------------------------------<-----------------

    /**
     * Muestra la vista principal de los servicios
     *
     * @return  Void
     */
    public function servicios()
    {
        $data['servicios'] = $this->{$this->model}->listar_usuarios();

        foreach ($data['servicios'] as $key => $usuario) {
            $usuario->admin = ($usuario->admin == 1) ? 'Si' : 'No';
            $usuario->active = ($usuario->active == 1) ? 'Activo' : 'In-activo';

            $usuario->grupos = $this->{$this->model}->obtener_grupos_usuario($usuario->usuario_id);
        }

        $this->load->view($this->views . 'servicios', $data);
    }
    // -------------------------------------------------------------------

    /**
     * Agrega una nuevo servicio al catalogo
     *
     * @return  Void
     */
    public function servicios_agregar()
    {
        /*
                // Validaciones de Formulario
                $this->form_validation->set_rules(
                    array(
                        array(
                            'field' => 'input_correo',
                            'label' => 'Correo electrónico',
                            'rules' => 'required|valid_email|is_unique[usuarios.email]',
                            'errors' => array(
                                'is_unique' => 'El correo electrónico ingresado ya esta en uso',
                            ),
                        ),
                        array(
                            'field' => 'input_nombre',
                            'label' => 'Nombre',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_apellidos',
                            'label' => 'Apellidos',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_grupos[]',
                            'label' => 'Grupos',
                            'rules' => 'required|numeric'
                        ),
                        array(
                            'field' => 'input_contrasenia',
                            'label' => 'Contraseña',
                            'rules' => 'required'
                        ),
                        array(
                            'field' => 'input_repitcontrasenia',
                            'label' => 'Repetir contraseña',
                            'rules' => 'required|matches[input_contrasenia]'
                        )
                    )
                );

                if( $this->form_validation->run() && $this->input->post() ){

                    //Corremos libreria
                    $this->load->library('bcrypt');

                    $data = array(
                        'email' 	=> $this->input->post('input_correo',TRUE),
                        'nombre' 	=> $this->input->post('input_nombre',TRUE),
                        'apellidos' => $this->input->post('input_apellidos',TRUE),
                        'password' 	=> $this->bcrypt->hash_password($this->input->post('input_contrasenia',TRUE)),
                        'admin' 	=> ($this->input->post('input_admin',TRUE) == 'on' ) ? 1 : 0,
                        'creado_en' => date('Y:m:d'),
                    );

                    $grupos = $this->input->post('input_grupos',TRUE);

                    $this->alertas->db($this->{$this->model}->gurdar_usuario($data, $grupos),'sistema/usuarios');
                }

                //Vista
                $data['grupos'] = $this->{$this->model}->listar_grupos();
        */
        $this->load->view($this->views . 'agregar_servicio');

    }
    // -------------------------------------------------------------------

    /**
     * Editar un servicio del catalogo
     *
     * @param Int
     * @return  Void
     */
    public function servicios_editar($id = NULL)
    {
        //Obtenemos el usuario a editar
        if (!$data['usuario'] = $this->{$this->model}->obtener_usuario($id))
            $this->alertas->info('sistema/usuarios');

        $data['usuario']->grupos = $this->{$this->model}->obtener_grupos_usuario($id);

        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_nombre',
                    'label' => 'Nombre',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_apellidos',
                    'label' => 'Apellidos',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_grupos[]',
                    'label' => 'Grupos',
                    'rules' => 'required|numeric'
                ),
            )
        );

        if ($this->form_validation->run() && $this->input->post()) {

            //Obtenemos el usuario a editar
            if (!$usuario = $this->{$this->model}->obtener_usuario($this->input->post('id_token', TRUE)))
                $this->alertas->info('sistema/usuarios');

            //Corremos libreria
            $this->load->library('bcrypt');

            $data_update = array(
                'nombre' => $this->input->post('input_nombre', TRUE),
                'apellidos' => $this->input->post('input_apellidos', TRUE),
                'admin' => ($this->input->post('input_admin', TRUE) == 'on') ? 1 : 0,
                'active' => ($this->input->post('input_active', TRUE) == 'on') ? 1 : 0,
            );

            $grupos = $this->input->post('input_grupos', TRUE);

            $this->alertas->db($this->{$this->model}->actualizar_usuario($usuario->usuario_id, $data_update, $grupos), 'sistema/usuarios');

        }

        //Vista
        $data['grupos'] = $this->{$this->model}->listar_grupos();

        $this->load->view($this->views . 'editar_servicio', $data);

    }
    // -------------------------------------------------------------------

    /**
     * Cambiar contraseña de usuario
     *
     * @return  Void
     */

    /*
    public function usuarios_cambiarpass()
    {
        //Obtenemos el usuario a editar
        if( !$data['usuario'] 	= $this->{$this->model}->obtener_usuario($this->input->post('id_token',TRUE)) )
            $this->alertas->info('sistema/usuarios');

        // Validaciones de Formulario
        $this->form_validation->set_rules(
            array(
                array(
                    'field' => 'input_contrasenia',
                    'label' => 'Contraseña',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'input_repitcontrasenia',
                    'label' => 'Repetir contraseña',
                    'rules' => 'required|matches[input_contrasenia]'
                )
            )
        );

        if( $this->form_validation->run() && $this->input->post() ){

            //Corremos libreria
            $this->load->library('bcrypt');

            $data_update = array(
                'password' 	=> $this->bcrypt->hash_password($this->input->post('input_contrasenia',TRUE)),
            );

            $this->alertas->db($this->{$this->model}->actualizar_usuario_pass($data['usuario']->usuario_id,$data_update),'sistema/usuarios');
        }

        //Vista
        $data['grupos'] 	= $this->{$this->model}->listar_grupos();

        $this->load->view($this->views.'editar_usuario',$data);
    }
    */
    // -------------------------------------------------------------------

    /**
     * Elimina una determinado servicio del catalogo
     *
     * @param Int
     * @return  Void
     */
    public function servicios_eliminar($id = NULL)
    {
        $this->alertas->db($this->{$this->model}->eliminar_usuarios($id), 'producto/productos');
    }
    // -------------------------------------------------------------------

    /**
     * Muestra la lista de modulos
     *
     * @return  Void
     */

    // -------------------------------------------------------------------

    /**
     * Agrega un nuevo modulo
     *
     * @return  Void
     */

    // -------------------------------------------------------------------

    /**
     * Edita un modulo
     *
     * @param Int
     * @return  Void
     */

    // -------------------------------------------------------------------

    /**
     * Elimina un determinado modulo
     *
     * @param Int
     * @return  Void
     */

    // -------------------------------------------------------------------

    /**
     * Muestra la lista de grupos
     *
     * @return  Void
     */

    // -------------------------------------------------------------------

    /**
     * Agrega un nuevo grupo
     *
     * @return  Void
     */

    // -------------------------------------------------------------------

    /**
     * Edita un grupo
     * @param Int
     * @return  Void
     */

    // -------------------------------------------------------------------

    /**
     * Elimina un determinado grupo
     *
     * @param Int
     * @return  Void
     */

    // -------------------------------------------------------------------
}
