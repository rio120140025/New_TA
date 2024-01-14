<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\LaporanModel;

class DetailLaporan extends Controller
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
    public function index($no_laporan)
    {
        if (!$this->session->get('logged_in')) {
            return view('errors/html/error_404');
        }

        $id_akun = $this->session->get('id_akun');

        $no_laporan = str_replace('-', '/', $no_laporan);
        $no_laporan = str_replace('%20', ' ', $no_laporan);

        $data['laporan'] = $this->laporanModel->getLaporanDetails($no_laporan);

        if ($data['laporan'] == null) {
            return view('errors/html/error_404');
        }

        $email = $this->session->get('email');
        $user = $this->loginModel->getUser($email);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role == 1) {
                return view('Admin/v_Detail_Laporan', $data);
            } elseif ($id_role == 2) {
                if ($id_akun == $data['laporan']['id_akun'] && $data['laporan']['kronologi'] != null) {
                    return view('User/v_Detail_Laporan', $data);
                } else {
                    return view('errors/html/error_404');
                }
            }
        }
    }
}
