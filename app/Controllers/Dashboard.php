<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Dashboard extends Controller
{
    protected $loginModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->loginModel = new LoginModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $email = $this->session->get('email');
        $user = $this->loginModel->get_user($email);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role == 1) {
                return view('Admin/v_Dashboard');
            } elseif ($id_role == 2) {
                return view('User/v_Dashboard');
            }
        }

        return view('Error/v_Error');
    }
}

