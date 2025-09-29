<?php

namespace App\Models;

use CodeIgniter\Model;

class PagoModel extends Model {
    
    // Configuración de la tabla
    protected $table      = 'pagos';       // Nombre exacto de la tabla en MySQL
    protected $primaryKey = 'id_pagos';    // Llave primaria

    // Campos permitidos para la inserción/actualización masiva
    protected $allowedFields = [
        'nombre'
    ];
    
    // Configuraciones estándar de CI4
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps  = false; // No hay created_at/updated_at en el esquema
    protected $skipValidation = false;
    
    // Reglas de validación
    protected $validationRules = [
        'nombre' => 'max_length[30]', // varchar(30)
    ];

}