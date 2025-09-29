<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model {
    
    // Configuración de la tabla
    protected $table      = 'empleados';     // Nombre exacto de la tabla en MySQL
    protected $primaryKey = 'id_empleados';  // Llave primaria

    // Campos permitidos para la inserción/actualización masiva
    // Excluimos la PK (id_empleados) y la FK (id_especialidades) para que el desarrollador la maneje explícitamente, 
    // aunque la FK podría incluirse si se maneja desde aquí. Por seguridad, incluiremos la FK.
    protected $allowedFields = [
        'nombre',
        'apellido',
        'especialidad',
        'email',
        'id_especialidades' // Es una clave foránea (FK) y no es NULA (No)
    ];
    
    // Configuraciones estándar de CI4
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps  = false; // No hay created_at/updated_at
    protected $skipValidation = false;
    
    // Opcional: Reglas de validación
    protected $validationRules = [
        // Las claves foráneas y primarias NO NULAS se validan por su tipo.
        'id_especialidades' => 'required|integer', 
        
        // Las otras columnas se limitan por su varchar
        'nombre'            => 'max_length[30]',
        'apellido'          => 'max_length[30]',
        'especialidad'      => 'max_length[30]',
        'email'             => 'max_length[35]|valid_email',
    ];

}