<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*-------------------------------------------------------------------------
* Modelo Sistema
* ------------------------------------------------------------------------
*
* Modelo de base de datos para el controlador Sistema
*
* @author Fabrica de software / Universidad Politécnica de Tlaxcala
*
*/
class Mcotizacion extends CI_Model
{
    /**
     * Lista todos los cotizaciones
     * 
     * @return  Array
     */
    public function listar_cotizacion()
    {
        // en get va el nombre d ela tabla
        return $this->db->get('cotizacion')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene cotizacion
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_cotizacion($id)
    {
        $this->db->where('Idcotizacion',$id);
        return $this->db->get('cotizacion')->row();
    }
    // --------------------------------------------------------------------
    /**
     * Guarda cotizacion
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_cotizacion($data)
    {
        return $this->db->insert('cotizacion', $data);

    }
    // --------------------------------------------------------------------

    /**
     * Lista todos los clientes
     * 
     * @return  Array
     */
    public function listar_clientes()
    {
        return $this->db->get('clientes')->result();
         
    }
    // --------------------------------------------------------------------


    /**
     * Actualiza cotizacion
     * 
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_cotizacion($id,$data)
    {   
        $this->db->where('Idcotizacion',$id);
        return $this->db->update('cotizacion',$data); 
    }
    
    // --------------------------------------------------------------------

    /**
     * Elimina cotizacion
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_cotizacion($id)
    {
        $this->db->where('Idcotizacion', $id);// id de la tabla
        return $this->db->delete('cotizacion');//tabla
    }
    // --------------------------------------------------------------------

    
    /**
     * Ulimo ID de cotizacion
     */
    public function ultimo(){
        $this->db->order_by('Idcotizacion','DESC');
        return $ultimo_id = $this->db->get('cotizacion')->row();

    }
   // --------------------------------------------------------------------
   
    /**
     * Obtener cotizacion
     */
       public function obtener_cotizacion1($id)
    {
        $this->db->where('Idcotizacion',$id);
        return $this->db->get('cotizacion')->result();
    }
      // --------------------------------------------------------------------
    /**
     * Obtener clientes
     */
 public function obtener_clientes($id)
    {
      $this->db->where('idcliente',$id);
        return $this->db->get('clientes')->result();
         
    }
      // --------------------------------------------------------------------
   
    /**
     * Obtener equipos
     */

 public function obtener_equipos()
    {
        
        return $this->db->get('equipos')->result();
    }
   // --------------------------------------------------------------------
    


 
}