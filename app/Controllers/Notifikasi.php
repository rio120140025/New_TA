<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\LaporanModel;

class Notifikasi extends Controller
{
    protected $session;
    protected $loginModel;
    protected $laporanModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->loginModel = new LoginModel();
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return view('errors/html/error_404');
        }

        $email = $this->session->get('email');
        $user = $this->loginModel->getUser($email);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role == 1) {
                $data['laporan'] = $this->laporanModel->findAll();
                return view('Admin/v_Notifikasi', $data);
            } elseif ($id_role == 2) {
                return view('errors/html/error_404');
            }
        }
    }
}

