<?php

namespace App\Controllers;

use App\Models\VentaModel;
use CodeIgniter\Controller;

class ControladorVentas extends BaseController{

    protected $venta;

    public function __construct() {
        $this->venta = new \App\Models\VentaModel();
    }

    // Mostrar todas las ventas (usando JOINs para mostrar nombres de FKs)
    public function verVentas(){
        $db = \Config\Database::connect();
        $builder = $db->table('ventas');
        $builder->select('ventas.*, p.nombre as nombre_producto, c.nombre_completo as nombre_cliente, pg.nombre as tipo_pago, v.nombre as nombre_vendedor');
        $builder->join('productos p', 'p.id_producto = ventas.id_producto', 'left');
        $builder->join('clientes c', 'c.id_cliente = ventas.id_cliente', 'left');
        $builder->join('pagos pg', 'pg.id_pagos = ventas.id_pago', 'left');
        $builder->join('empleados v', 'v.id_empleados = ventas.id_vendedor', 'left');
        $query = $builder->get();
        
        $datosBD['datosBD'] = $query->getResultArray();
        return view('ventas', $datosBD);
    }

    // Guardar nueva venta
    public function guardarVenta(){
        $datos = [
            'id_producto'   => $this->request->getVar('txt_id_producto'),
            'id_cliente'    => $this->request->getVar('txt_id_cliente'),
            'id_pago'       => $this->request->getVar('txt_id_pago'),
            'fecha_venta'   => $this->request->getVar('txt_fecha_venta'),
            'cantidad'      => $this->request->getVar('txt_cantidad'),
            'id_vendedor'   => $this->request->getVar('txt_id_vendedor')
        ];
        
        $this->venta->insert($datos);
        return $this->verVentas();
    }

    // Eliminar venta
    public function eliminarVenta($id=null){
        $this->venta->delete($id);
        return $this->verVentas();
    }

    // Localizar venta por ID (para editar)
    public function localizarVenta($id=null){
        $datosVenta['datosVenta'] = $this->venta->find($id);
        return view('frm_actualizarVenta', $datosVenta);
    }

    // Modificar venta
    public function modificarVenta(){
        $id = $this->request->getVar('txt_id_ventas');
        $datos = [
            'id_producto'   => $this->request->getVar('txt_id_producto'),
            'id_cliente'    => $this->request->getVar('txt_id_cliente'),
            'id_pago'       => $this->request->getVar('txt_id_pago'),
            'fecha_venta'   => $this->request->getVar('txt_fecha_venta'),
            'cantidad'      => $this->request->getVar('txt_cantidad'),
            'id_vendedor'   => $this->request->getVar('txt_id_vendedor')
        ];

        $this->venta->update($id, $datos);
        return $this->verVentas();
    }
}