<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modelo Sistema
 * ------------------------------------------------------------------------
 *
 * Modelo de base de datos para el controlador Sistema
 *
 * @author Arturo Flores & Marilyn Vivaldo / Universidad Politécnica de Tlaxcala
 *
 */
class Mrecepcion extends CI_Model
{
    /**
     * Lista todos los modulos
     *
     * @return  Array
     */
    public function listar_recepcion()
    {
        $this->db->select('recepcion.*, recepcion.fecha as fecha_recepcion');
        $this->db->join('equipoordenservicio','equipoordenservicio.idequipo=recepcion.equipoordenservicio_idequipo');
        $this->db->select('equipos.*, equipos.equipo as nombre_equipo');
        $this->db->join('equipos','equipos.idequipo=equipoordenservicio.idequipo');
        return $this->db->get('recepcion')->result();
    }
    // --------------------------------------------------------------------
    /**
     * Guardar procesos
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_procesos($data)
    {
        return $this->db->insert('recepcion', $data);
    }
    // --------------------------------------------------------------------
    /**
     * obtener procesos mediante un id especifico
     *
     * @param   Int
     * @return  Object
     */
    public function obtener_procesos($id)
    {
        $this->db->where('idrecepcion', $id);
        return $this->db->get('recepcion')->row();
    }
    // --------------------------------------------------------------------
    /**
     * Actulizar un proceso mediante un id especifico
     *
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_procesos($id,$data)
    {
        $this->db->where('idrecepcion', $id);
        return $this->db->update('recepcion', $data);
    }
    // --------------------------------------------------------------------
    /**
     * Eliminar procesos mediante un id especifico
     *
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_procesos($id)
    {
        $this->db->where('idrecepcion', $id);
        return $this->db->delete('recepcion');
    }
    // --------------------------------------------------------------------
    /**
     * Obtener equipos de la orden de servicio de la foreign key
     *
     * @return  Array
     */
    public function obtener_equipos()
    {
        $this->db->join('equipos','equipos.idequipo=equipoordenservicio.idequipo');
        return $this->db->get('equipoordenservicio')->result();
    }
    // --------------------------------------------------------------------
}