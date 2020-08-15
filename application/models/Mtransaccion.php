<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modelo Sistema
 * ------------------------------------------------------------------------
 *
 * Modelo de base de datos para el controlador Sistema
 *
 * @author Marilyn Vivaldo & Arturo Flores / Universidad Politécnica de Tlaxcala
 *
 */
class Mtransaccion extends CI_Model
{
    /**
     * Listado de todas las transacciones
     *
     * @return  Array
     */
    public function listar_transaccion()
    {
        $this->db->select('transaccion_proceso.*, areasdestino.nombrearea as area_destino');
        $this->db->join('areas_trabajo as areasdestino','areasdestino.idarea=transaccion_proceso.idareadestino');
        $this->db->select('transaccion_proceso.*, areas_trabajo.nombrearea as area_envia');
        $this->db->join('areas_trabajo','areas_trabajo.idarea=transaccion_proceso.idareaenvia');
        return $this->db->get('transaccion_proceso')->result();
    }
    // --------------------------------------------------------------------
    /**
     * Guardar una transaccion
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_transaccion($data)
    {
        return $this->db->insert('transaccion_proceso', $data);
    }
    // --------------------------------------------------------------------
    /**
     * Obtener una transaccion mediante el uso de un id especifico
     *
     * @param   Int
     * @return  Object
     */
    public function obtener_transaccion($id)
    {
        $this->db->where('Id_transaccion', $id);
        return $this->db->get('transaccion_proceso')->row();
    }
    // --------------------------------------------------------------------
    /**
     * Ontener un procesos especifico
     *
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_transaccion($id,$data)
    {
        $this->db->where('Id_transaccion', $id);
        return $this->db->update('transaccion_proceso', $data);
    }
    // --------------------------------------------------------------------
    /**
     * Eliminar transacción
     *
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_transaccion($id)
    {
        $this->db->where('Id_transaccion', $id);
        return $this->db->delete('transaccion_proceso');
    }
    // --------------------------------------------------------------------
    /**
     * Obtener la area de trabajo de envio
     *
     * @return  Array
     */
    public function obtener_areaenvia()
    {
        return $this->db->get('areas_trabajo')->result();
    }
    // --------------------------------------------------------------------
    /**
     * Obtener la area de trabajo de destino
     *
     * @return  Array
     */
    public function obtener_areasdestino()
    {
        return $this->db->get('areas_trabajo')->result();
    }
    // --------------------------------------------------------------------
    /**
     * Obtener la tabla de orden de servicio
     *
     * @return  Array
     */
    public function obtener_ordenservicio()
    {
        return $this->db->get('ordenservicio')->result();
    }
    // --------------------------------------------------------------------



}