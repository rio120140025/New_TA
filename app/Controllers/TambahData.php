<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\DataProvinsiModel;
use App\Models\DataKabupatenKotaModel;
use App\Models\DataKecamatanModel;
use App\Models\DataKelurahanDesaModel;
use App\Models\DataTipeMotorModel;

class TambahData extends Controller
{
    protected $session;
    protected $loginModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->loginModel = new LoginModel();
        $this->dataprovinsiModel = new DataProvinsiModel();
        $this->datakabupatenkotaModel = new DataKabupatenKotaModel();
        $this->datakecamatanModel = new DataKecamatanModel();
        $this->datakelurahandesaModel = new DataKelurahanDesaModel();
        $this->datatipemotorModel = new DataTipeMotorModel();
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
                $data['provinsi'] = $this->dataprovinsiModel->getProvinsiData(null, null, null);
                $data['kabupatenkota'] = $this->datakabupatenkotaModel->getKabupatenKotaData(null, null, null);
                $data['kecamatan'] = $this->datakecamatanModel->getKecamatanData(null, null, null);
                $data['kelurahandesa'] = $this->datakelurahandesaModel->getKelurahanDesaData(null, null, null);
                $data['motor'] = $this->datatipemotorModel->getTipeMotorData(null, null, null);

                return view('Admin/v_Tambah_Data', $data);
            } elseif ($id_role == 2) {
                return view('errors/html/error_404');
            }
        }
    }
}

