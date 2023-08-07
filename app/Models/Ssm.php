<?php 

namespace App\Models;
use CodeIgniter\Model;

class Ssm extends Model
{
    protected $table = 'ssmoperacion';
    protected $primarykey = 'id';

    protected $allowedFields = [
        'id',
        'area',
        'fecha',
        'linea',
        'autor',
        'no_empl',
        'sintoma_averia',
        'descripcion_trabajo',
        'departamento',
        'prioridad',
        'no_ot',
        'no_st',
        'created_at'
    ];

    public function obtenerDatos()
    {
        $data = $this->findAll(); // Obtiene todos los registros de la tabla
        //var_dump($data); // Verifica los datos recuperados
        return $data;
    }
}
