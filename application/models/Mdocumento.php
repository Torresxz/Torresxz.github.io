<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modelo Sistema
 * ------------------------------------------------------------------------
 *
 * Modelo de base de datos para el controlador Documento
 *
 * @author RQ7 David/Nazareth/Ricardo
 *
 */
class Mdocumento extends CI_Model
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
    //----------------------------------------------------------------

    /**
     * Lista todos los archivos
     *
     * @return  Array
     */
    public function listar_documento()
    {
        $this->db->join('equipospatron','equipospatron.idequipopatron=archivo.idequipopatron');
        return $this->db->get('archivo')->result();
    }
//------------------------------------------------------------------

    /**
     * Lista todos los equipos patrone
     *
     * @return  Array
     */
    public function listar_equipos()
    {
        return $this->db->get('equipospatron')->result();
    }
//------------------------------------------------------------------

    /**
     * Lista todos los orden servicio
     *
     * @return  Array
     */
    public function obtener_orden()
    {
        return $this->db->get('ordenservicio')->result();
    }
//------------------------------------------------------------------

    /**
     * Lista todos los equipos patron
     *
     * @return  Array
     */
    public function obtener_equipo()
    {
        return $this->db->get('equipospatron')->result();
    }
//------------------------------------------------------------------

    /**
     * Lista todos los documentos
     *
     * @param Int
     * @return  Boolean
     */
    public function obtener_documento($idarchivo)
    {
        $this->db->where('idarchivo',$idarchivo);
        return $this->db->get('archivo')->row();
    }
//-------------------------------------------------------------------------

    /**
     * Guarda archivos
     *
     * @param Array
     * @return  Boolean
     */
    public function guardar_archivo($data)
    {
        return $this->db->insert('archivo', $data);

    }
    // --------------------------------------------------------------------

    /**
     * actualizar archivos
     *
     * @param Int
     * @param Array
     * @return  Boolean
     */
    public function actualizar_archivo($id,$data)
    {
        $this->db->where('idarchivo', $id);
        return $this->db->update('archivo', $data);

    }
    // --------------------------------------------------------------------

    /**
     * Elimina el archivo
     *
     * @param Int
     * @return  Boolean
     */
    public function eliminar_archivo($id)
    {
        $this->db->where('idarchivo', $id);
        return $this->db->delete('archivo');
    }
    //--------------------------------------------------------------------

}