<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataProvinsiModel;
use App\Models\DataKabupatenKotaModel;
use App\Models\DataKecamatanModel;
use App\Models\DataKelurahanDesaModel;

class DataKelurahanDesa extends Controller
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->dataprovinsiModel = new DataProvinsiModel();
        $this->datakabupatenkotaModel = new DataKabupatenKotaModel();
        $this->datakecamatanModel = new DataKecamatanModel();
        $this->datakelurahandesaModel = new DataKelurahanDesaModel();
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
        $data['kecamatan'] = $this->datakecamatanModel->getKecamatanData(null, null, null);
        $data['kelurahandesa'] = $this->datakelurahandesaModel->getKelurahanDesaData($limit, $offset, $search);
        $data['total_data'] = $this->datakecamatanModel->getTotalSearchedKecamatan($search);
        $data['total_pages'] = ceil($data['total_data'] / $limit);
        $data['current_page'] = $page;

        return view('Admin/v_DataKelurahanDesa', $data);
    }

    public function get_kelurahandesa_by_kecamatan()
    {
        $dis_id = $this->request->getPost('dis_id');
        $kelurahandesa = $this->datakelurahandesaModel->getKelurahanDesaByKecamatan($dis_id);
        return json_encode($kelurahandesa);
    }

    public function save_kelurahandesa($page)
    {
        $subdis_name = $this->request->getPost('subdis_name');
        $dis_id = $this->request->getPost('dis_id');

        if (!empty($subdis_name) && !empty($dis_id)) {
            $data = [
                'subdis_name' => $subdis_name,
                'dis_id' => $dis_id
            ];
            $this->datakelurahandesaModel->insertKelurahanDesaData($data);
        }

        $message = "Data kelurahan/desa berhasil ditambahkan.";
        $data['message'] = $message;
        return redirect()->to("datakelurahandesa/{$page}")->with('message', $message);
    }

    public function delete_kelurahandesa($page, $subdis_id)
    {
        if (!empty($subdis_id)) {
            $this->datakelurahandesaModel->deleteKelurahanDesaData($subdis_id);
        }

        $message = "Data kelurahan/desa berhasil dihapus.";
        $data['message'] = $message;
        return redirect()->to("datakelurahandesa/{$page}")->with('message', $message);
    }
}
