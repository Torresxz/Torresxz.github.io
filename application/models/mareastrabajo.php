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
class Mareastrabajo extends CI_Model
{


    /**
     * listar areas de trabajo
     * 
     * @return  Array
     */
    public function listar_areastrabajo()
    {
        return $this->db->get('areas_trabajo')->result();
    }
    // 

///////////////////////////////////////////////////////////////////////////

    /**
     * Guarda areas de trabajo
     * @param   Array
     * @return  Boolean
     */
    public function gurdar_areastrabajo($data)
    {
       
        
        return $this->db->insert('areas_trabajo',$data); 

       // return $this->db->trans_status();
        
    }
    // --------------------------------------------------------------------

    /**
     * Obtiene un usuario en específico
     * 
     * @param   Int
     * @return  Object
     */
    public function obtener_areastrabajo($id)
    {
        $this->db->where('idarea',$id);
        return $this->db->get('areas_trabajo')->row();
    }
    // --------------------------------------------------------------------

    /**
     * actualizar areas de trabajo
     * 
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_areastrabajo($id,$data)
    {
        $this->db->where('idarea',$id);
        return $this->db->update('areas_trabajo',$data);
    }
    // --------------------------------------------------------------------
    /**
     * Elimina area de trabajo
     * 
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_areastrabajo($id)
    {
        $this->db->where('idarea', $id);
        return $this->db->delete('areas_trabajo');
    }
    // --------------------------------------------------------------------
    //-----------------------------------------------------------
}