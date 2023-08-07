<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario;

class Login extends BaseController
{
    public function __construct() {

		$db = db_connect();
		$this->usuario = new Usuario($db);
	}

    public function index()
    {
        helper(['form']);
        return view('login/index');

        // $contrasena = "admin123";
        // $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        // echo $hash;
    }

    public function auth()
    {
        $session = session();
        $model = new Usuario();
        
        $loginInput = $this->request->getVar('login');
        $password = $this->request->getVar('password');
         // Consulta para buscar por email o usuario
        $data = $model->where('email', $loginInput)
                    ->orWhere('usuario', $loginInput)
                    ->first();
        
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $nombreCompleto = $data['nombre'] . ' ' . $data['apellido'];
                $ses_data = [
                    'idlogin' => $data['idlogin'],
                    'nombre' => $nombreCompleto,
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('dashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('http://localhost/code/');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('http://localhost/code/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('http://localhost/code/');
    }

    public function register()
    {
        helper(['form']);
        $data = [];
        return view('signup/index', $data);
    }
    
    public function registersave()
    {
        $nombre	= $this->request->getPost('nombre');
		$apellido	= $this->request->getPost('apellido');
		$email		= $this->request->getPost('email');
		$usuario		= $this->request->getPost('usuario');
		$password		= $this->request->getPost('password');
        // Generar el hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
	
		$data = [
			'nombre'		=> $nombre,
			'apellido'		=> $apellido,
			'email'			=> $email,
			'usuario'			=> $usuario,
			'password'			=> $hashedPassword,
            'estado'		=> 'A',

		];

		$result = $this->usuario->add($data);
		if($result) {
			// Mostrar alerta y redireccionar
            $message = "New user is registered successfully.";
            $redirect_url = base_url('/');  // Cambia esta URL según la página a la que deseas redireccionar
        
            echo '<script>alert("' . $message . '"); window.location.href = "' . $redirect_url . '";</script>';
		} else {
			// Mostrar alerta y redireccionar
            $message = "Error";
            $redirect_url = base_url('register');  // Cambia esta URL según la página a la que deseas redireccionar
        
            echo '<script>alert("' . $message . '"); window.location.href = "' . $redirect_url . '";</script>';
		}
    }
}
