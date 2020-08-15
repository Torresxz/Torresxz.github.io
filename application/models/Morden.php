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
class Morden extends CI_Model
{

	 /**
     * Lista todos las ordenes.
     *
     * @return  Array
     */
    public function listar_orden()
    {

        return $this->db->get('ordenservicio')->result();
    }
    // --------------------------------------------------------------------



    /**
     * Obtiene un orde en específico
     *
     * @param   Int
     * @return  Object
     */
    public function obtener_orden($id)
    {
        $this->db->where('idordenservicio',$id);
        return $this->db->get('ordenservicio')->row(); //row ver solo 1 registro
    }
    // --------------------------------------------------------------------


        /**
         * Obtiene un orde en  cotizacion
         *
         * @param   Int
         * @return  Object
         */
        public function obtener_cotizacion()
        {
            return $this->db->get('cotizacion')->result();
        }
        // --------------------------------------------------------------------

            /**
               * Obtiene una cotizacion en específico
               *
                 * @param   Int
                 * @return  Object
                 */
            public function obtener_cotizacion1($id)
            {
                $this->db->where('idcotizacion',$id);
                return $this->db->get('cotizacion')->row();
            }
            // --------------------------------------------------------------------

		/**
     * agregar orden de servicio
     *
     * @param   Int
     * @param   Array
     * @return  Boolea
     */
    public function orden_agregar($data)
    {
        $this->db->where('idordenservicio',$id);
        return $this->db->update('ordenservicio',$data);
    }
    // --------------------------------------------------------------------


		    /**
		     * Guarda orden
		     *
		     * @param   Array
		     * @return  Boolea
		     */
		    public function guardar_orden_de_servicio($data)
		    {
		        return $this->db->insert('ordenservicio',$data);
		    }
		    // --------------------------------------------------------------------


            /**
             * Actualiza un servicio
             *
             * @param Int
             * @param Array
             * @return  Boolea
             */
            public function editar_orden_de_servicio($id,$data)
            {


                $this->db->where('idordenservicio', $id);
                return $this->db->update('ordenservicio', $data);
            }

            // --------------------------------------------------------------------
            /**
                * Elimina un orden de servicio
                * @param Int
                * @return Boolean
                */

               public function eliminar_orden($id)
               {
                   $this->db->where('idordenservicio', $id);
                   return $this->db->delete('ordenservicio');
               }


}
