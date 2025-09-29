<?php

namespace App\Controllers;

use App\Models\ClienteModel; // Usaremos el nombre 'ClienteModel' como estándar de CI4
use CodeIgniter\Controller;

class ControladorClientes extends BaseController{

    // Usaremos el modelo de forma correcta en CI4
    protected $cliente;

    public function __construct() {
        $this->cliente = new \App\Models\ClienteModel();
    }

    // Mostrar todos los clientes
    public function verClientes(){
        // Usando el ORM del modelo directamente para simplicidad
        $datosBD['datosBD'] = $this->cliente->findAll(); 
        
        return view('clientes', $datosBD); // Vista clientes.php
    }

    // Guardar nuevo cliente
    public function guardarCliente(){
        $datos = [
            'nombre_completo' => $this->request->getVar('txt_nombre_completo'),
            'direccion'       => $this->request->getVar('txt_direccion'),
            'telefono_casa'   => $this->request->getVar('txt_telefono_casa'),
            'telefono_trabajo'=> $this->request->getVar('txt_telefono_trabajo'),
            'email'           => $this->request->getVar('txt_email')
        ];
        
        $this->cliente->insert($datos);
        return $this->verClientes();
    }

    // Eliminar cliente
    public function eliminarCliente($id=null){
        $this->cliente->delete($id);
        return $this->verClientes();
    }

    // Localizar cliente por ID (para editar)
    public function localizarCliente($id=null){
        $datosCliente['datosCliente'] = $this->cliente->find($id);
        return view('frm_actualizarCliente', $datosCliente); // Vista para editar
    }

    // Modificar cliente
    public function modificarCliente(){
        $id = $this->request->getVar('txt_id_cliente');
        $datos = [
            'nombre_completo' => $this->request->getVar('txt_nombre_completo'),
            'direccion'       => $this->request->getVar('txt_direccion'),
            'telefono_casa'   => $this->request->getVar('txt_telefono_casa'),
            'telefono_trabajo'=> $this->request->getVar('txt_telefono_trabajo'),
            'email'           => $this->request->getVar('txt_email')
        ];

        $this->cliente->update($id, $datos);
        return $this->verClientes();
    }
}