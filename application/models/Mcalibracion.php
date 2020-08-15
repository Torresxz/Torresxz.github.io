<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modelo de equipos de calibración
 * ------------------------------------------------------------------------
 *
 * Modelo de equipos de calibración
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class MCalibracion extends CI_Model
{
    /**
     * Lista todos los equipos patron
     *
     * @return  Array
     */
    public function listar_equipospatron()
    {
        return $this->db->get('equipospatron')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Lista todos los orden de historial de calibracion.
     *
     * @return  Array
     */
    public function listar_historial_calibracion()
    {

        return $this->db->get('historialcalibracion')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene un orde en específico de historial de calibracion
     *
     * @param   Int
     * @return  Object
     */
    public function obtener_historial($id)
    {
        $this->db->where('id_FechaC',$id);
        return $this->db->get('historialcalibracion')->row(); //row ver solo 1 registro
    }
    // --------------------------------------------------------------------



    /**
     * Obtiene calibracion especifica, obtiene mi tabla
     *
     * @param   Int
     * @return  Object
     */
    public function obtener_calibracion($id)
    {
        $this->db->where('idequipopatron',$id);
        return $this->db->get('equipospatron')->row();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene un orde en específico HC
     *
     * @param   Int
     * @return  Object
     */
    public function obtener_equipo()
    {
        return $this->db->get('equipospatron')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Actualizar tabla de calibracion
     *
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_calibracion($id,$data)
    {

        $this->db->where('idequipopatron',$id);

        return $this->db->update('equipospatron',$data);

    }
    // --------------------------------------------------------------------

    /**
     * Actualiza orden de servicio HC
     *
     * @param   Int
     * @param   Array
     * @return  String
     */
    public function orden_agregar($data)
    {
        $this->db->where('idordenservicio',$id);
        return $this->db->update('ordenservicio',$data);
    }
    // --------------------------------------------------------------------


    /**
     * Elimina el un registro en la lista
     *
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_calibracion($id)
    {
        $this->db->where('idequipopatron', $id);
        return $this->db->delete('equipospatron');
    }


    // --------------------------------------------------------------------

    /**
     * Inserta el registro en la base de datos
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_calibracion($data)
    {
        return $this->db->insert('equipospatron',$data);
    }
    // --------------------------------------------------------------------

    /**
     * Guarda orden HC
     *
     * @param   Array
     * @return  Void
     */
    public function guardar_historial_calibracion($data)
    {
        return $this->db->insert('historialcalibracion',$data);
    }
    // --------------------------------------------------------------------

    /**
     * Actualiza historial de cotizacion HC
     *
     *
     * @param Array
     * @return  Boolea
     */
    public function editar_historial_de_calibracion($id,$data)
    {


        $this->db->where('id_FechaC', $id);
        //  $this->db->join('idcotizacion','ordenservicio.idcotizacion=cotizacion.idcotizacion');
        return $this->db->update('historialcalibracion', $data);
    }

    // --------------------------------------------------------------------
  
}