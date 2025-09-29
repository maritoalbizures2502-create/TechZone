<?php

namespace App\Models;

use CodeIgniter\Model;

class GarantiaModel extends Model {
    
    // Configuración de la tabla
    protected $table      = 'garantias';     // Nombre exacto de la tabla en MySQL
    protected $primaryKey = 'id_garantias';  // Llave primaria

    // Campos permitidos para la inserción/actualización masiva
    // Incluimos las tres claves foráneas ya que son obligatorias (Nulo: No)
    protected $allowedFields = [
        'nombre',
        'tipo_garantia',
        'duracion',
        'marca',
        'id_producto',
        'id_vendedor',
        'id_ventas'
    ];
    
    // Configuraciones estándar de CI4
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps  = false; // No hay created_at/updated_at en el esquema
    protected $skipValidation = false;
    
    // Reglas de validación
    protected $validationRules = [
        // Las claves foráneas (FK) son obligatorias y deben ser enteros
        'id_producto'   => 'required|integer',
        'id_vendedor'   => 'required|integer',
        'id_ventas'     => 'required|integer',
        
        // Las otras columnas se limitan por su varchar
        'nombre'        => 'max_length[30]',
        'tipo_garantia' => 'max_length[50]',
        'duracion'      => 'max_length[50]',
        'marca'         => 'max_length[50]',
    ];

}