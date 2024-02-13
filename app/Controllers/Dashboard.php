<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\LaporanModel;
use App\Models\DataDiriModel;
use App\Models\DataKecamatanModel;
use App\Models\DataKelurahanDesaModel;

class Dashboard extends Controller
{
    protected $session;
    protected $loginModel;
    protected $laporanModel;
    protected $datadiriModel;
    protected $datakecamatanModel;
    protected $datakelurahandesaModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = \Config\Services::session();
        $this->loginModel = new LoginModel();
        $this->laporanModel = new LaporanModel();
        $this->datadiriModel = new DataDiriModel();
        $this->datakecamatanModel = new DataKecamatanModel();
        $this->datakelurahandesaModel = new DataKelurahanDesaModel();
    }

    public function index($page = 1)
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
                $limit = 50;
                $offset = ($page - 1) * $limit;
                $search = $this->request->getPost('search');

                $filter = [
                    'lokasi' => $this->request->getPost('lokasi'),
                    'start_date_kejadian' => $this->request->getPost('start_date_kejadian'),
                    'end_date_kejadian' => $this->request->getPost('end_date_kejadian'),
                    'start_date_melapor' => $this->request->getPost('start_date_melapor'),
                    'end_date_melapor' => $this->request->getPost('end_date_melapor'),
                    'filter_motor' => $this->request->getPost('motor'),
                    'status' => $this->request->getPost('status'),
                ];

                $data['kecamatan'] = $this->datakecamatanModel->getKecamatanData(null, null, null);
                $data['kelurahandesa'] = $this->datakelurahandesaModel->getKelurahanDesaData(null, null, null);
                $data['laporan'] = $this->laporanModel->getAllLaporanDetails($limit, $offset, $search, $filter);
                $data['total_data'] = $this->laporanModel->getTotalLaporan($search, $filter);
                $data['total_pages'] = ceil($data['total_data'] / $limit);
                $data['current_page'] = $page;

                $data['marker'] = $this->laporanModel->getAllLaporanDetails(null, null, null, $filter);
                $data['motor'] = $this->laporanModel->getMotorTypeRatio($filter);
                $data['bulan'] = $this->laporanModel->getMonthlyIncidents($filter);
                $data['lokasi'] = $this->laporanModel->getLokasiData($filter);

                $jsonData = json_encode([
                    'laporan' => $data['marker'],
                    'motor' => $data['motor'],
                    'bulan' => $data['bulan'],
                    'lokasi' => $data['lokasi'],
                ]);

                echo '<script>var serverData = ' . $jsonData . ';</script>';

                return view('Admin/v_Dashboard', $data);
            } elseif ($id_role == 2) {
                $dataDiri = $this->datadiriModel->getDataByAkunId($id_akun);

                $data['laporan'] = $this->laporanModel->where('id_akun', $id_akun)->findAll();
                $data['nama'] = $dataDiri['nama'];

                return view('User/v_Dashboard', $data);
            }
        }
    }
}
