<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataMotorModel;
use App\Models\DataTipeMotorModel;

class DataMotor extends Controller
{
    protected $session;
    protected $datamotorModel;
    protected $datatipemotorModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->datamotorModel = new DataMotorModel();
        $this->datatipemotorModel = new DataTipeMotorModel();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $id_akun = $this->session->get('id_akun');

        $data['kendaraan'] = $this->datamotorModel->getMotorDataWithTipeMotor($id_akun);
        $data['motor'] = $this->datatipemotorModel->getTipeMotorData(null, null, null);

        return view('User/v_DataMotor', $data);
    }

    public function save_motor()
    {
        $id_akun = $this->session->get('id_akun');
        $no_plat = $this->request->getPost('no_plat');
        $no_rangka = $this->request->getPost('no_rangka');
        $no_mesin = $this->request->getPost('no_mesin');
        $warna = $this->request->getPost('warna');
        $id_motor = $this->request->getPost('id_motor');

        $data = [
            'no_plat' => $no_plat,
            'no_rangka' => $no_rangka,
            'no_mesin' => $no_mesin,
            'warna' => $warna,
            'id_akun' => $id_akun,
            'id_motor' => $id_motor,
        ];

        $this->datamotorModel->insertMotor($data);

        $message = "Data motor berhasil ditambahkan.";
        $data['message'] = $message;
        return redirect()->to("DataMotor")->with('message', $message);
    }

    public function delete_motor($id_kendaraan)
    {
        $this->datamotorModel->deleteMotor($id_kendaraan);

        $message = "Data motor berhasil dihapus.";
        $data['message'] = $message;
        return redirect()->to("DataMotor")->with('message', $message);
    }
}

