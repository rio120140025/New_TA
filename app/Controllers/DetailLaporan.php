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

        if ($id_akun == $data['laporan']['id_akun']) {
            return view('User/v_Detail_Laporan', $data);
        } else {
            return view('errors/html/error_404');
        }
    }
}
