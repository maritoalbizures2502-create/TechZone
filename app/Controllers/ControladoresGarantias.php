<?php

namespace App\Controllers;

use App\Models\GarantiaModel;
use CodeIgniter\Controller;

class ControladorGarantias extends BaseController{

    protected $garantia;

    public function __construct() {
        $this->garantia = new \App\Models\GarantiaModel();
    }

    // Mostrar todas las garantías (usando JOINs para mostrar los nombres de las FKs)
    public function verGarantias(){
        $db = \Config\Database::connect();
        $builder = $db->table('garantias');
        $builder->select('garantias.*, p.nombre as nombre_producto, v.nombre as nombre_vendedor, ven.id_ventas');
        $builder->join('productos p', 'p.id_producto = garantias.id_producto', 'left');
        $builder->join('empleados v', 'v.id_empleados = garantias.id_vendedor', 'left'); // Asumo que id_vendedor se refiere a empleados
        $builder->join('ventas ven', 'ven.id_ventas = garantias.id_ventas', 'left');
        $query = $builder->get();
        
        $datosBD['datosBD'] = $query->getResultArray();
        return view('garantias', $datosBD);
    }

    // Guardar nueva garantía
    public function guardarGarantia(){
        $datos = [
            'nombre'          => $this->request->getVar('txt_nombre'),
            'tipo_garantia'   => $this->request->getVar('txt_tipo_garantia'),
            'duracion'        => $this->request->getVar('txt_duracion'),
            'marca'           => $this->request->getVar('txt_marca'),
            'id_producto'     => $this->request->getVar('txt_id_producto'),
            'id_vendedor'     => $this->request->getVar('txt_id_vendedor'),
            'id_ventas'       => $this->request->getVar('txt_id_ventas')
        ];
        
        $this->garantia->insert($datos);
        return $this->verGarantias();
    }

    // Eliminar garantía
    public function eliminarGarantia($id=null){
        $this->garantia->delete($id);
        return $this->verGarantias();
    }

    // Localizar garantía por ID (para editar)
    public function localizarGarantia($id=null){
        $datosGarantia['datosGarantia'] = $this->garantia->find($id);
        return view('frm_actualizarGarantia', $datosGarantia);
    }

    // Modificar garantía
    public function modificarGarantia(){
        $id = $this->request->getVar('txt_id_garantias');
        $datos = [
            'nombre'          => $this->request->getVar('txt_nombre'),
            'tipo_garantia'   => $this->request->getVar('txt_tipo_garantia'),
            'duracion'        => $this->request->getVar('txt_duracion'),
            'marca'           => $this->request->getVar('txt_marca'),
            'id_producto'     => $this->request->getVar('txt_id_producto'),
            'id_vendedor'     => $this->request->getVar('txt_id_vendedor'),
            'id_ventas'       => $this->request->getVar('txt_id_ventas')
        ];

        $this->garantia->update($id, $datos);
        return $this->verGarantias();
    }
}