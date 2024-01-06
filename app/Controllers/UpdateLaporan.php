<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\LaporanModel;

class UpdateLaporan extends Controller
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
                return view('Admin/v_Update_Laporan');
            } elseif ($id_role == 2) {
                if ($id_akun == $data['laporan']['id_akun'] && $data['laporan']['alamat_kejadian'] == null) {
                    return view('User/v_Update_Laporan', $data);
                } else {
                    return view('errors/html/error_404');
                }
            }
        }
    }
    public function update_laporan()
    {
        $email = $this->session->get('email');
        $user = $this->loginModel->getUser($email);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role == 1) {
            } elseif ($id_role == 2) {
                $no_laporan = $this->request->getPost('no_laporan');
                $kronologi = $this->request->getPost('kronologi');
                $kerugian = $this->request->getPost('kerugian');
                $alamat_kejadian = $this->request->getPost('alamat_kejadian');

                $data = [
                    'kronologi' => $kronologi,
                    'kerugian' => $kerugian,
                    'alamat_kejadian' => $alamat_kejadian,
                ];

                $where = ['no_laporan' => $no_laporan];
                $result = $this->laporanModel->updateLaporan($where, $data);

                if ($result) {
                    $message = "Berhasil melengkapi data laporan.";
                    return redirect()->to('Dashboard')->with('message', $message);
                } else {
                    $message = "Gagal melengkapi data laporan.";
                    return redirect()->to('Dashboard')->with('message', $message);
                }
            }
        }
    }
}
