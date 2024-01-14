<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LaporanModel;

class Home extends Controller
{
    protected $laporanModel;
    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }
    public function index()
    {
        return view('v_Home');
    }
    public function get_data()
    {
        $data['laporan'] = $this->laporanModel->getAllLaporanDetailsStatus();
        $data['motor'] = $this->laporanModel->getMotorTypeRatioStatus();
        $data['bulan'] = $this->laporanModel->getMonthlyIncidentsStatus();
        $data['subdis'] = $this->laporanModel->getSubdistrictDataStatus();

        return $this->response->setJSON($data);
    }
}
