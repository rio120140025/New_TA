<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\LaporanModel;
use App\Models\DataDiriModel;

class Dashboard extends Controller
{
    protected $session;
    protected $loginModel;
    protected $laporanModel;
    protected $datadiriModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        $this->loginModel = new LoginModel();
        $this->laporanModel = new LaporanModel();
        $this->datadiriModel = new DataDiriModel();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $id_akun = $this->session->get('id_akun');
        $email = $this->session->get('email');
        $user = $this->loginModel->getUser($email);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role == 1) {
                return view('Admin/v_Dashboard');
            } elseif ($id_role == 2) {
                $dataDiri = $this->datadiriModel->getDataByAkunId($id_akun);

                $data['laporan'] = $this->laporanModel->where('id_akun', $id_akun)->findAll();
                $data['nama'] = $dataDiri['nama'];

                return view('User/v_Dashboard', $data);
            }
        }
    }
}

