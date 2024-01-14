<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\LaporanModel;

class UpdateLaporanTKP extends Controller
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

        $no_laporan = str_replace('-', '/', $no_laporan);
        $no_laporan = str_replace('%20', ' ', $no_laporan);

        $data['no_laporan'] = $no_laporan;
        $data['laporan'] = $this->laporanModel->getLaporanDetails($no_laporan);


        if ($data['laporan'] == null) {
            return view('errors/html/error_404');
        }

        $email = $this->session->get('email');
        $user = $this->loginModel->getUser($email);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role == 1) {
                return view('Admin/v_Update_Laporan_TKP', $data);
            } elseif ($id_role == 2) {
                return view('errors/html/error_404');
            }
        }
    }
    public function update_laporan()
    {
        $no_laporan = $this->request->getPost('no_laporan');
        $alamat_kejadian = $this->request->getPost('alamat_kejadian');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        $data = [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'alamat_kejadian' => $alamat_kejadian,
        ];

        $where = ['no_laporan' => $no_laporan];
        $result = $this->laporanModel->updateLaporan($where, $data);

        $no_laporan = str_replace('/', '-', $no_laporan);

        if ($result) {
            $message = "Berhasil mengubah data titik lokasi TKP laporan.";
            return redirect()->to('detaillaporan/' . $no_laporan)->with('message', $message);
        } else {
            $message = "Gagal mengubah data titik lokasi TKP laporan.";
            return redirect()->to('detaillaporan/' . $no_laporan)->with('message', $message);
        }
    }
}
