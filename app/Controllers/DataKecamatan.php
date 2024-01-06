<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataProvinsiModel;
use App\Models\DataKabupatenKotaModel;
use App\Models\DataKecamatanModel;

class DataKecamatan extends Controller
{
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->dataprovinsiModel = new DataProvinsiModel();
        $this->datakabupatenkotaModel = new DataKabupatenKotaModel();
        $this->datakecamatanModel = new DataKecamatanModel();
    }

    public function index($page = 1)
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('login');
        }

        $limit = 50;
        $offset = ($page - 1) * $limit;
        $search = $this->request->getPost('search');

        $data['provinsi'] = $this->dataprovinsiModel->getProvinsiData(null, null, null);
        $data['kabupatenkota'] = $this->datakabupatenkotaModel->getKabupatenKotaData(null, null, null);
        $data['kecamatan'] = $this->datakecamatanModel->getKecamatanData($limit, $offset, $search);
        $data['total_data'] = $this->datakecamatanModel->getTotalSearchedKecamatan($search);
        $data['total_pages'] = ceil($data['total_data'] / $limit);
        $data['current_page'] = $page;

        return view('Admin/v_DataKecamatan', $data);
    }
    public function get_kecamatan_by_kabupatenkota()
    {
        $city_id = $this->request->getPost('city_id');
        $kecamatan = $this->datakecamatanModel->getKecamatanByKabupatenKota($city_id);
        return json_encode($kecamatan);
    }

    public function get_kecamatan_at_lampung()
    {
        $city_id = 123;
        $kecamatan123 = $this->datakecamatanModel->getKecamatanByKabupatenKota($city_id);
        return json_encode($kecamatan123);
    }

    public function save_kecamatan($page)
    {
        $dis_name = $this->request->getPost('dis_name');
        $city_id = $this->request->getPost('city_id');

        if (!empty($dis_name) && !empty($city_id)) {
            $data = [
                'dis_name' => $dis_name,
                'city_id' => $city_id
            ];
            $this->datakecamatanModel->insertKecamatanData($data);
        }

        $message = "Data kecamatan berhasil ditambahkan.";
        $data['message'] = $message;
        return redirect()->to("datakecamatan/{$page}")->with('message', $message);
    }

    public function delete_kecamatan($page, $dis_id)
    {
        if (!empty($dis_id)) {
            $this->datakecamatanModel->deleteKecamatanData($dis_id);
        }

        $message = "Data kecamatan berhasil dihapus.";
        $data['message'] = $message;
        return redirect()->to("datakecamatan/{$page}")->with('message', $message);
    }
}
