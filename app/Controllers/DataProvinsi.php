<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataProvinsiModel;

class DataProvinsi extends Controller
{
    protected $dataprovinsiModel;
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->dataprovinsiModel = new DataProvinsiModel();
    }

    public function index($page = 1)
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('login');
        }

        $limit = 50;
        $offset = ($page - 1) * $limit;
        $search = $this->request->getPost('search');

        $data['provinsi'] = $this->dataprovinsiModel->getProvinsiData($limit, $offset, $search);
        $data['total_data'] = $this->dataprovinsiModel->getTotalSearchedProvinsi($search);
        $data['total_pages'] = ceil($data['total_data'] / $limit);
        $data['current_page'] = $page;

        return view('Admin/v_DataProvinsi', $data);
    }

    public function save_provinsi($page)
    {
        $prov_name = $this->request->getPost('prov_name');

        if (!empty($prov_name)) {
            $data = [
                'prov_name' => $prov_name,
            ];
            $this->dataprovinsiModel->insertProvinsiData($data);
        }

        $message = "Data provinsi berhasil ditambahkan.";
        $data['message'] = $message;
        return redirect()->to("dataprovinsi/{$page}")->with('message', $message);
    }

    public function delete_provinsi($page, $prov_id)
    {
        if (!empty($prov_id)) {
            $this->dataprovinsiModel->deleteProvinsiData($prov_id);
        }

        $message = "Data provinsi berhasil dihapus.";
        $data['message'] = $message;
        return redirect()->to("dataprovinsi/{$page}")->with('message', $message);
    }
}
