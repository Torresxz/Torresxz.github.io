<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *-------------------------------------------------------------------------
 * Modelo Producto
 * ------------------------------------------------------------------------
 *
 * Modelo de base de datos para el controlador Producto
 *
 * @author Fabrica de software / Universidad Politécnica de Tlaxcala
 *
 */
class Mproductos extends CI_Model
{

    /**
     * Lista todos los productos
     *
     * @return  Array
     */
    public function listar_productos()
    {
        $this->db->join('proveedores','proveedores.idproveedor=productos.idproveedor');
        return $this->db->get('productos')->result();
    }
    //

    /**
     * Listar productos por orden de compra
     *
     * @param   Int
     * @return  Array
     */
    public function obtener_ordencompra_productos($id)
    {
        $this->db->join('productosordencompra','productosordencompra.idordencompra=ordencompra.idordencompra');
        $this->db->where('productosordencompra.idproducto',$id);
        return $this->db->get('ordencompra')->result();
    }
    // --------------------------------------------------------------------

    /**
     * Listar ordenes de compras
     *
     * @return  Array
     */
    public function listar_ordenescompras()
    {
        return $this->db->get('ordencompra')->result();
    }
    //

    /**
     * Guarda un producto
     *
     * @param Array
     * @return  Boolean
     */
    public function guardar_producto($data)
    {
        return $this->db->insert('productos', $data);

    }
    // --------------------------------------------------------------------

    /**
     * Guardar relacion entre productos y ordenes de compras
     *
     * @param   Array
     * @param   Array
     * @return  Boolean
     */
    public function guardar_productoordencompra($data, $ordencompra)
    {
        $this->db->trans_start();
        $this->db->insert('productos',$data);
        $producto_id = $this->db->insert_id();

        $index=0;
        foreach ($ordencompra as $key => $ordencom){
            $data_permisos[$index]['idproducto'] = $producto_id;
            $data_permisos[$index]['idordencompra']   = $ordencom;
            $index++;
        }

        $this->db->insert_batch('productosordencompra',$data_permisos);
        $this->db->trans_complete();

        return $this->db->trans_status();

    }
    // --------------------------------------------------------------------

    /**
     * Actualiza un producto
     *
     * @param Int
     * @param Array
     * @return  Boolean
     */
    public function actualizar_producto($id, $data)
    {


        $this->db->where('idproducto', $id);
        return $this->db->update('productos', $data);
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
    public function actualizar_productosordencompra($id, $data, $ordencompra)
    {
        $this->db->trans_start();
        $this->db->where('idproducto',$id);
        $this->db->delete('productosordencompra');

        $this->db->where('idproducto',$id);
        $this->db->update('productos',$data);

        $index=0;
        foreach ($ordencompra as $key => $ordencom){
            $data_permisos[$index]['idproducto'] = $id;
            $data_permisos[$index]['idordencompra']   = $ordencom;
            $index++;
        }

        $this->db->insert_batch('productosordencompra',$data_permisos);
        $this->db->trans_complete();

        return $this->db->trans_status();

    }
    // --------------------------------------------------------------------


    /**
     * Obtener proveedor para key producto
     *
     * @return  Array
     */
    public function obtener_proveedores()
    {
        return $this->db->get('proveedores')->result();
    }

    // --------------------------------------------------------------------

    /**
    //     * Obtiene un producto en específico
    //     *
    //     * @param   Int
    //     * @return  Object
    //     */
    public function obtener_producto($id)
    {
        $this->db->where('idproducto',$id);
        return $this->db->get('productos')->row();
    }
    // --------------------------------------------------------------------


    /**
     * Elimina un producto
     * @param Int
     * @return Boolean
     */

    public function eliminar_producto($id)
    {
        $this->db->where('idproducto', $id);
        return $this->db->delete('productos');
    }

}
////////////////////////////////////////////////////////////////////////////////////

