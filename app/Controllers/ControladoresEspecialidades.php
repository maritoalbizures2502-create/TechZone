<?php

namespace App\Controllers;

use App\Models\EspecialidadModel;
use CodeIgniter\Controller;

class ControladorEspecialidades extends BaseController{

    protected $especialidad;

    public function __construct() {
        $this->especialidad = new \App\Models\EspecialidadModel();
    }

    // Mostrar todas las especialidades
    public function verEspecialidades(){
        $datosBD['datosBD'] = $this->especialidad->findAll(); 
        return view('especialidades', $datosBD); 
    }

    // Guardar nueva especialidad
    public function guardarEspecialidad(){
        $nombre = $this->request->getVar('txt_nombre');
        
        $this->especialidad->insert(['nombre' => $nombre]);
        return $this->verEspecialidades();
    }

    // Eliminar especialidad
    public function eliminarEspecialidad($id=null){
        $this->especialidad->delete($id);
        return $this->verEspecialidades();
    }

    // Localizar especialidad por ID (para editar)
    public function localizarEspecialidad($id=null){
        $datosEspecialidad['datosEspecialidad'] = $this->especialidad->find($id);
        return view('frm_actualizarEspecialidad', $datosEspecialidad);
    }

    // Modificar especialidad
    public function modificarEspecialidad(){
        $id = $this->request->getVar('txt_id_especialidades');
        $nombre = $this->request->getVar('txt_nombre');
        
        $this->especialidad->update($id, ['nombre' => $nombre]);
        return $this->verEspecialidades();
    }
}