<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model {
    
    // Configuración de la tabla
    protected $table      = 'productos';     // Nombre exacto de la tabla en MySQL
    protected $primaryKey = 'id_producto';   // Llave primaria

    // Campos permitidos para la inserción/actualización masiva
    protected $allowedFields = [
        'nombre',
        'marca',
        'precio',
        'stock'
    ];
    
    // Configuraciones estándar de CI4
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps  = false; // No hay created_at/updated_at en el esquema
    protected $skipValidation = false;
    
    // Reglas de validación
    protected $validationRules = [
        // Las columnas se limitan por su varchar. Aunque precio y stock son numéricos, se usa varchar(50) en la BD.
        'nombre' => 'max_length[30]', 
        'marca'  => 'max_length[50]',
        'precio' => 'max_length[50]', 
        'stock'  => 'max_length[50]', 
    ];

}