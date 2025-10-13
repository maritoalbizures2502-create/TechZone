<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes extends Model { // o Cliente, según prefieras nombrar el archivo
    
    protected $table      = 'clientes';     // Nombre exacto de la tabla en MySQL
    protected $primaryKey = 'id_cliente';   // Llave primaria

    protected $allowedFields = [
        'nombre_completo',
        'direccion',
        'telefono_casa',
        'telefono_trabajo',
        'email'
    ];
    
    // Configuraciones adicionales para que funcione
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useTimestamps  = false;
    protected $skipValidation = false;
    
    // Opcional: Si quieres mantener las reglas de validación que definimos antes
    protected $validationRules = [
        'nombre_completo' => 'max_length[30]', 
        'direccion'       => 'max_length[45]', 
        'telefono_casa'   => 'max_length[10]', 
        'telefono_trabajo'=> 'max_length[11]', 
        'email'           => 'max_length[14]|valid_email',
    ];

}