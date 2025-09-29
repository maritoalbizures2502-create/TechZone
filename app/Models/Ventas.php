<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model {
    
    // Configuración de la tabla
    protected $table      = 'ventas';      // Nombre exacto de la tabla en MySQL
    protected $primaryKey = 'id_ventas';   // Llave primaria

    // Campos permitidos para la inserción/actualización masiva
    // Todas las columnas son obligatorias (Nulo: No), por lo que van en allowedFields
    protected $allowedFields = [
        'id_producto',
        'id_cliente',
        'id_pago',
        'fecha_venta',
        'cantidad',
        'id_vendedor'
    ];
    
    // Configuraciones estándar de CI4
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps  = false; // No hay created_at/updated_at
    protected $skipValidation = false;
    
    // Reglas de validación
    protected $validationRules = [
        // Las claves foráneas y la cantidad son obligatorias y deben ser enteros
        'id_producto'   => 'required|integer',
        'id_cliente'    => 'required|integer',
        'id_pago'       => 'required|integer',
        'cantidad'      => 'required|integer', 
        'id_vendedor'   => 'required|integer',
        
        // La fecha es obligatoria y debe tener formato de fecha
        'fecha_venta'   => 'required|valid_date',
    ];

}