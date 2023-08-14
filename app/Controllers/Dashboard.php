<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Ssm;

class Dashboard extends BaseController
{
    private $ssmModel;

    public function __construct()
    {
        $this->ssmModel = new Ssm();
    }

    public function index()
    {
        $data['datos'] = $this->ssmModel->obtenerDatosSinNoOTNoST();
        $data['countEnEspera'] = $this->ssmModel->contarEnEspera();

        // Guardar el valor en la sesión
        session()->set('countEnEspera', $data['countEnEspera']);

        // Obtener el valor de la sesión
        $data['countEnviados'] = session('countEnviados');

        // var_dump($data['countEnEspera']);
        return view('dashboard/index', $data);
    }

    public function indexEnviados()
    {
        $data['datos'] = $this->ssmModel->obtenerDatosConNoOTNoST();
        $data['countEnviados'] = $this->ssmModel->contarEnviados();

        // Guardar el valor en la sesión
        session()->set('countEnviados', $data['countEnviados']);

        // Obtener el valor de la sesión
        $data['countEnEspera'] = session('countEnEspera');

        return view('dashboardenv/index', $data);
    }

    public function updatevista()
    {
        return view('vistaupdate/index'); 
    }
    
    public function editarRegistro()
    {
        // Obtén el ID del registro desde la URL
        $id = $this->request->getGet('id');
        $area = $this->request->getGet('area');
        $linea = $this->request->getGet('linea');
        $autor = $this->request->getGet('autor');
        $sintoma_averia = $this->request->getGet('sintoma_averia');
        
        // Obtén los datos del registro por el ID desde el modelo
        $registro = $this->ssmModel->obtenerPorId($id);

        // Pasa los datos del registro a la vista de edición
        $data['registro'] = $registro;
        
        return view('vistaupdate/index', $data);
    }

    public function guardarEdicion()
    {
        // Obtén los datos del formulario
        $id = $this->request->getPost('id');
        $no_ot = $this->request->getPost('no_ot'); 
        $no_st = $this->request->getPost('no_st');
    
        // Actualiza los datos en la base de datos utilizando el modelo
        $data = [
            'no_ot' => $no_ot,
            'no_st' => $no_st
        ];
    
        $this->ssmModel->updateDash($id, $data);
    
        // Redirecciona a donde desees después de guardar los cambios
        return redirect()->to('dashboard');
    }
    
    public function vistaeliminar()
    {
        // Obtén el ID del registro desde la URL
        $id = $this->request->getGet('id');
        
        // Obtén los datos del registro por el ID desde el modelo
        $registro = $this->ssmModel->obtenerPorId($id);
        
        return view('vistadelete/index', ['registro' => $registro]);
    }

    public function eliminarRegistro($id)
    {
        // Llama a la función deleteDash del modelo para eliminar el registro
        $this->ssmModel->deleteDash($id);

        // Redirecciona a donde desees después de eliminar el registro
        return redirect()->to('dashboard');
    }


    public function exportarExcel()
    {
        $filename = 'ssm_data.xlsx';

        $path = $this->ssmModel->exportarExcel($filename);
        
        return $this->response->download($path, null);
    }
}

