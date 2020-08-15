<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *-------------------------------------------------------------------------
 * Modelo Sistema
 * ------------------------------------------------------------------------
 *
 * Modelo de base de datos para el controlador Ordencompra
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Mordencompra extends CI_Model
{

    /**
     * Lista todos las ordenes de compras
     *
     * @return  Array
     */
    public function listar_ordenescompras()
    {
        $this->db->join('proveedores','proveedores.idproveedor=ordencompra.idprovedor');
        return $this->db->get('ordencompra')->result();
    }
    //

    /**
     * Lista todos los productos
     *
     * @return  Array
     */
    public function listar_productos()
    {

        return $this->db->get('productos')->result();
    }
    //

    /**
     * Listar ordenes de compras por productos
     *
     * @param   Int
     * @return  Array
     */
    public function obtener_productos_ordencompra($id)
    {
        $this->db->join('productosordencompra','productosordencompra.idproducto=productos.idproducto');
        $this->db->where('productosordencompra.idordencompra',$id);
        return $this->db->get('productos')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Obtener proveedor para key ordencompra
     *
     * @return  Array
     */
    public function obtener_proveedores()
    {
        return $this->db->get('proveedores')->result();
    }
// --------------------------------------------------------------------
    /**
    //     * Obtiene una orden de compra en específico
    //     *
    //     * @param   Int
    //     * @return  Object
    //     */
    public function obtener_ordencompras($id)
    {
        $this->db->join('proveedores','proveedores.idproveedor=ordencompra.idprovedor');
        $this->db->where('idordencompra',$id);
        $this->db->join('productos','proveedores.idproveedor=ordencompra.idprovedor');
        return $this->db->get('ordencompra')->row();
    }
    // --------------------------------------------------------------------

    /**
     * Guarda una orden de compra

     * @param Array
     * @return  Boolean
     */
    public function guardar_ordencompra($data)
    {
        return $this->db->insert('ordencompra', $data);
    }

    /**
     * Guardar relacion entre ordenes de compras y productos
     *
     * @param   Array
     * @param   Array
     * @return  Boolean
     */

    public function guardar_ordencompraproducto($data, $productos)
    {
        $this->db->trans_start();
        $this->db->insert('ordencompra',$data);
        $idordencompra = $this->db->insert_id();

        $index=0;
        foreach ($productos as $key => $producto){
            $data_productosordencompra[$index]['idproducto']   = $producto;
            $data_productosordencompra[$index]['idordencompra'] = $idordencompra;
            $index++;
        }

        $this->db->insert_batch('productosordencompra',$data_productosordencompra);
        $this->db->trans_complete();

        return $this->db->trans_status();

    }
    // --------------------------------------------------------------------

    /**
     * Elimina una orden de compra
     * @param Int
     * @return Boolean
     */

    public function eliminar_ordencompra($id)
    {
        $this->db->where('idordencompra', $id);
        return $this->db->delete('ordencompra');
    }
    // --------------------------------------------------------------------


    /**
    //     * Obtiene una orden de compra en específico
    //     *
    //     * @param   Int
    //     * @return  Object
    //     */
    public function obtener_ordencompra($id)
    {
        $this->db->where('idordencompra',$id);
        return $this->db->get('ordencompra')->row();
    }
    // --------------------------------------------------------------------

    /**
     * Actualizar relacion productos y ordenes de compras
     *
     * @param   Int
     * @param   Array
     * @param   Array
     * @return  Boolean
     */
    public function actualizar_ordencompra($id, $data, $productos)
    {
        $this->db->trans_start();
        $this->db->where('idordencompra',$id);
        $this->db->delete('productosordencompra');

        $this->db->where('idordencompra',$id);
        $this->db->update('ordencompra',$data);

        $index=0;
        foreach ($productos as $key => $producto){
            $data_ordencompraproductos[$index]['idproducto'] = $producto;
            $data_ordencompraproductos[$index]['idordencompra']   = $id;
            $index++;
        }

        $this->db->insert_batch('productosordencompra',$data_ordencompraproductos);
        $this->db->trans_complete();

        return $this->db->trans_status();

    }
    // --------------------------------------------------------------------
////////////////////////////////////////////////////////////////////////////////////

}