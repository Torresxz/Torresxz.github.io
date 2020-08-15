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
class Maccesorios extends CI_Model
{
    /**
     * Lista todos los modulos
     *
     * @return  Array
     */
    public function listar_Accesorios()
    {
        return $this->db->get('accesorios')->result();
    }
    // --------------------------------------------------------------------



    /**
     * Guarda accesorios
     *
     * @param   Array
     * @return  Boolean
     */
    public function guardar_accesorios($data)
    {
        return $this->db->insert('accesorios', $data);
    }
    // --------------------------------------------------------------------
    /**
     * obtener procesos mediante id
     *
     * @param   Int
     * @return  Object
     */
    public function obtener_accesorio($idaccesorios)
    {
        $this->db->where('idaccesorios', $idaccesorios);
        return $this->db->get('accesorios')->row();//row es un registro result muchos

    }

    // --------------------------------------------------------------------

    /**
    * Obtener proveedor para key producto
    *
    * @return  Array
    */
   public function obtener_accesorios()
   {
       return $this->db->get('accesorios')->result();//para varios registros
   }

   // --------------------------------------------------------------------

   /**
   * Obtener proveedor para key producto
   *
   * @return  Array
   */
  public function obtener_equipo()
  {
      return $this->db->get('equipospatron')->result();
  }
  // --------------------------------------------------------------------


    /**
     * actualizar un accesorio en especifico especifico
     *
     * @param   Int
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_Accesorios($id,$data)
    {
        $this->db->where('idaccesorios', $id);

        return $this->db->update('accesorios', $data);

    }
    // --------------------------------------------------------------------
    /**
     * Eliminar accesorios
     *
     * @param   Int
     * @return  Boolean
     */
    public function eliminar_Accesorios($id)
    {
        $this->db->where('idaccesorios', $id);
        return $this->db->delete('accesorios');//borrarregistro de la tabla
    }

    // --------------------------------------------------------------------







}
