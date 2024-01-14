<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataProvinsiModel;
use App\Models\DataKabupatenKotaModel;

class DataKabupatenKota extends Controller
{
    protected $session;
    protected $dataprovinsiModel;
    protected $datakabupatenkotaModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->dataprovinsiModel = new DataProvinsiModel();
        $this->datakabupatenkotaModel = new DataKabupatenKotaModel();
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
        $data['kabupatenkota'] = $this->datakabupatenkotaModel->getKabupatenKotaData($limit, $offset, $search);
        $data['total_data'] = $this->datakabupatenkotaModel->getTotalSearchedKabupatenKota($search);
        $data['total_pages'] = ceil($data['total_data'] / $limit);
        $data['current_page'] = $page;

        return view('Admin/v_DataKabupatenKota', $data);
    }

    public function get_kabupatenkota_by_provinsi()
    {
        $prov_id = $this->request->getPost('prov_id');
        $kabupatenkota = $this->datakabupatenkotaModel->getKabupatenKotaByProvinsi($prov_id);
        return json_encode($kabupatenkota);
    }

    public function save_kabupatenkota($page)
    {
        $city_name = $this->request->getPost('city_name');
        $prov_id = $this->request->getPost('prov_id');

        if (!empty($city_name) && !empty($prov_id)) {
            $data = [
                'city_name' => $city_name,
                'prov_id' => $prov_id
            ];
            $this->datakabupatenkotaModel->insertKabupatenKotaData($data);
        }

        $message = "Data kabupaten/kota berhasil ditambahkan.";
        $data['message'] = $message;
        return redirect()->to("datakabupatenkota/{$page}")->with('message', $message);
    }

    public function delete_kabupatenkota($page, $city_id)
    {
        if (!empty($city_id)) {
            $this->datakabupatenkotaModel->deleteKabupatenKotaData($city_id);
        }

        $message = "Data kabupaten/kota berhasil dihapus.";
        $data['message'] = $message;
        return redirect()->to("datakabupatenkota/{$page}")->with('message', $message);
    }
}
