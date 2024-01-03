<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends Controller
{
    protected $session;
    protected $loginModel;
    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        if ($this->session->get('logged_in')) {
            return redirect()->to(base_url('Dashboard'));
        }

        return view('v_Login');
    }

    public function process_login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->loginModel->getUser($email);

        if ($user && property_exists($user, 'password') && password_verify($password, $user->password)) {
            $session_data = [
                'id_akun' => $user->id_akun,
                'email' => $email,
                'logged_in' => true,
            ];
            $this->session->set($session_data);

            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'error' => 'Email atau password salah']);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('Login'));
    }
}
