<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use CodeIgniter\Controller;

class ControladorProductos extends BaseController{

    protected $producto;

    public function __construct() {
        $this->producto = new \App\Models\ProductoModel();
    }

    // Mostrar todos los productos
    public function verProductos(){
        $datosBD['datosBD'] = $this->producto->findAll(); 
        return view('productos', $datosBD); 
    }

    // Guardar nuevo producto
    public function guardarProducto(){
        $datos = [
            'nombre' => $this->request->getVar('txt_nombre'),
            'marca'  => $this->request->getVar('txt_marca'),
            'precio' => $this->request->getVar('txt_precio'),
            'stock'  => $this->request->getVar('txt_stock')
        ];
        
        $this->producto->insert($datos);
        return $this->verProductos();
    }

    // Eliminar producto
    public function eliminarProducto($id=null){
        $this->producto->delete($id);
        return $this->verProductos();
    }

    // Localizar producto por ID (para editar)
    public function localizarProducto($id=null){
        $datosProducto['datosProducto'] = $this->producto->find($id);
        return view('frm_actualizarProducto', $datosProducto);
    }

    // Modificar producto
    public function modificarProducto(){
        $id = $this->request->getVar('txt_id_producto');
        $datos = [
            'nombre' => $this->request->getVar('txt_nombre'),
            'marca'  => $this->request->getVar('txt_marca'),
            'precio' => $this->request->getVar('txt_precio'),
            'stock'  => $this->request->getVar('txt_stock')
        ];

        $this->producto->update($id, $datos);
        return $this->verProductos();
    }
}