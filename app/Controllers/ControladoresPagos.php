<?php

namespace App\Controllers;

use App\Models\PagoModel;
use CodeIgniter\Controller;

class ControladorPagos extends BaseController{

    protected $pago;

    public function __construct() {
        $this->pago = new \App\Models\PagoModel();
    }

    // Mostrar todos los pagos
    public function verPagos(){
        $datosBD['datosBD'] = $this->pago->findAll(); 
        return view('pagos', $datosBD); 
    }

    // Guardar nuevo pago
    public function guardarPago(){
        $nombre = $this->request->getVar('txt_nombre');
        
        $this->pago->insert(['nombre' => $nombre]);
        return $this->verPagos();
    }

    // Eliminar pago
    public function eliminarPago($id=null){
        $this->pago->delete($id);
        return $this->verPagos();
    }

    // Localizar pago por ID (para editar)
    public function localizarPago($id=null){
        $datosPago['datosPago'] = $this->pago->find($id);
        return view('frm_actualizarPago', $datosPago);
    }

    // Modificar pago
    public function modificarPago(){
        $id = $this->request->getVar('txt_id_pagos');
        $nombre = $this->request->getVar('txt_nombre');
        
        $this->pago->update($id, ['nombre' => $nombre]);
        return $this->verPagos();
    }
}