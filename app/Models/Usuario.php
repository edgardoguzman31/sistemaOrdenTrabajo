<?php 

namespace App\Models;
use CodeIgniter\Model;

class Usuario extends Model
{
    protected $table = 'login';
    protected $primarykey = 'idlogin';
    protected $allowedFields = [
        'nombre',
        'apellido',
        'email',
        'usuario',
        'password',
        'estado', 
        'created_at',
    ];

    function add($data) {
		return $this->db->table('login')->insert($data);
	}

}
