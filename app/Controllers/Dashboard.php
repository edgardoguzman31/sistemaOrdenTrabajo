<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Ssm;

class Dashboard extends BaseController
{
    public function index()
    {
        $ssmdatos = new Ssm(); // Crea una instancia del modelo 

        $data['datos'] = $ssmdatos->obtenerDatos();
        return view('dashboard/index', $data);
    }

}

