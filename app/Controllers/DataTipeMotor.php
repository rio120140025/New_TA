<?php

namespace App\Controllers;

use App\Models\DataTipeMotorModel;
use CodeIgniter\Controller;

class DataTipeMotor extends Controller
{
    protected $datatipemotorModel;
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->datatipemotorModel = new DataTipeMotorModel();
    }

    public function index($page = 1)
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to('login');
        }

        $limit = 50;
        $offset = ($page - 1) * $limit;
        $search = $this->request->getPost('search');

        $data['motor'] = $this->datatipemotorModel->getTipeMotorData($limit, $offset, $search);
        $data['total_data'] = $this->datatipemotorModel->getTotalSearchedTipeMotor($search);
        $data['total_pages'] = ceil($data['total_data'] / $limit);
        $data['current_page'] = $page;

        return view('Admin/v_DataTipeMotor', $data);
    }

    public function save_tipe_motor($page)
    {
        $tipe_motor = $this->request->getPost('tipe_motor');

        if (!empty($tipe_motor)) {
            $data = [
                'tipe_motor' => $tipe_motor
            ];
            $this->datatipemotorModel->insertTipeMotorData($data);
        }

        $message = "Data tipe motor berhasil ditambahkan.";
        $data['message'] = $message;
        return redirect()->to("datatipemotor/{$page}")->with('message', $message);
    }

    public function delete_tipe_motor($page, $id_motor)
    {
        if (!empty($id_motor)) {
            $this->datatipemotorModel->deleteTipeMotorData($id_motor);
        }

        $message = "Data tipe motor berhasil dihapus.";
        $data['message'] = $message;
        return redirect()->to("datatipemotor/{$page}")->with('message', $message);
    }
}
