<?php

namespace App\Controllers;

use App\Models\EmpleadoModel;
use CodeIgniter\Controller;

class ControladorEmpleados extends BaseController{

    protected $empleado;

    public function __construct() {
        $this->empleado = new \App\Models\EmpleadoModel();
    }

    // Mostrar todos los empleados
    public function verEmpleados(){
        // Usamos el Builder para traer la especialidad por nombre (JOIN a tabla especialidades)
        $db = \Config\Database::connect();
        $builder = $db->table('empleados');
        $builder->select('empleados.*, especialidades.nombre as nombre_especialidad');
        $builder->join('especialidades', 'especialidades.id_especialidades = empleados.id_especialidades', 'left');
        $query = $builder->get();
        
        $datosBD['datosBD'] = $query->getResultArray();
        return view('empleados', $datosBD); // Vista empleados.php
    }

    // Guardar nuevo empleado
    public function guardarEmpleado(){
        $datos = [
            'nombre'            => $this->request->getVar('txt_nombre'),
            'apellido'          => $this->request->getVar('txt_apellido'),
            'especialidad'      => $this->request->getVar('txt_especialidad'), // Esto debería ser el ID
            'email'             => $this->request->getVar('txt_email'),
            'id_especialidades' => $this->request->getVar('txt_id_especialidades') // Usaremos la FK
        ];
        
        $this->empleado->insert($datos);
        return $this->verEmpleados();
    }

    // Eliminar empleado
    public function eliminarEmpleado($id=null){
        $this->empleado->delete($id);
        return $this->verEmpleados();
    }

    // Localizar empleado por ID (para editar)
    public function localizarEmpleado($id=null){
        $datosEmpleado['datosEmpleado'] = $this->empleado->find($id);
        return view('frm_actualizarEmpleado', $datosEmpleado);
    }

    // Modificar empleado
    public function modificarEmpleado(){
        $id = $this->request->getVar('txt_id_empleados');
        $datos = [
            'nombre'            => $this->request->getVar('txt_nombre'),
            'apellido'          => $this->request->getVar('txt_apellido'),
            'especialidad'      => $this->request->getVar('txt_especialidad'),
            'email'             => $this->request->getVar('txt_email'),
            'id_especialidades' => $this->request->getVar('txt_id_especialidades')
        ];

        $this->empleado->update($id, $datos);
        return $this->verEmpleados();
    }
}