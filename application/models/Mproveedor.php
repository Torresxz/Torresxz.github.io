<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modelo Sistema
 * ------------------------------------------------------------------------
 *
 * Modelo de base de datos para el controlador Proveedor
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Mproveedor extends CI_Model
{

    /**
     * Lista todos los proveedores
     *
     * @return  Array
     */
    public function listar_proveedores()
    {
        return $this->db->get('proveedores')->result();
    }
    //




////////////////////////////////////////////////////////////////////////////////////

    /**
     * Guarda los proveedores
     *
     * @param Array
     * @param Array
     * @return  Boolean
     */
    public function gurdar_proveedor($data)
    {
        $this->db->insert('proveedores', $data);

        return $this->db->trans_status();
    }
    //---------------------------------------------------------------------

    /**
     * Obtiene un proveedor en específico
     *
     * @param Int
     * @return  Object
     */
    public function obtener_proveedor($id)
    {
        $this->db->where('idproveedor', $id);
        return $this->db->get('proveedores')->row();
    }
    // --------------------------------------------------------------------

    /**
     * Actualiza el proveedor
     *
     * @param Int
     * @param Array
     * @return  Boolean
     */
    public function actualizar_proveedor($id, $data)
    {
        $this->db->where('idproveedor', $id);
        return $this->db->update('proveedores', $data);
    }
    // --------------------------------------------------------------------

    /**
     * Elimina el proveedor
     *
     * @param Int
     * @return  Boolean
     */
    public function eliminar_proveedor($id)
    {
        $this->db->where('idproveedor', $id);
        return $this->db->delete('proveedores');
    }
    //---------------------------------------------------------------------
}