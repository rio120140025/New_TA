<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DataDiriModel;
use App\Models\DataProvinsiModel;
use App\Models\DataKabupatenKotaModel;
use App\Models\DataKecamatanModel;
use App\Models\DataKelurahanDesaModel;

class DataDiri extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->datadiriModel = new DataDiriModel();
        $this->dataprovinsiModel = new DataProvinsiModel();
        $this->datakabupatenkotaModel = new DataKabupatenKotaModel();
        $this->datakecamatanModel = new DataKecamatanModel();
        $this->datakelurahandesaModel = new DataKelurahanDesaModel();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $id_akun = $this->session->get('id_akun');
        $dataDiri = $this->datadiriModel->getDataByAkunId($id_akun);

        $data['id_data_diri'] = $dataDiri['id_data_diri'];
        $data['nik'] = $dataDiri['nik'];
        $data['nama'] = $dataDiri['nama'];
        $data['agama'] = $dataDiri['agama'];
        $data['jenis_kelamin'] = $dataDiri['jenis_kelamin'];
        $data['alamat'] = $dataDiri['alamat'];
        $data['tempat_lahir'] = $dataDiri['tempat_lahir'];
        $data['tanggal_lahir'] = $dataDiri['tanggal_lahir'];
        $data['no_hp'] = $dataDiri['no_hp'];
        $data['pekerjaan'] = $dataDiri['pekerjaan'];

        $data['provinsi'] = $this->dataprovinsiModel->getProvinsiData(null, null, null);
        $data['kabupatenkota'] = $this->datakabupatenkotaModel->getKabupatenKotaData(null, null, null);
        $data['kecamatan'] = $this->datakecamatanModel->getKecamatanData(null, null, null);
        $data['kelurahandesa'] = $this->datakelurahandesaModel->getKelurahanDesaData(null, null, null);

        $location = $this->datadiriModel->getUserLocationBySubdisId($dataDiri['subdis_id']);

        return view('User/v_Data_diri', $data + ['location' => $location]);
    }

    public function update_data_diri()
    {
        $id_data_diri = $this->request->getPost('id_data_diri');
        $nik = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $agama = $this->request->getPost('agama');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $alamat = $this->request->getPost('alamat');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $no_hp = $this->request->getPost('no_hp');
        $pekerjaan = $this->request->getPost('pekerjaan');
        $subdis_id = $this->request->getPost('subdis_id');

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'agama' => $agama,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_hp' => $no_hp,
            'pekerjaan' => $pekerjaan,
            'subdis_id' => $subdis_id,
        ];

        $where = ['id_data_diri' => $id_data_diri];
        $this->datadiriModel->updateData($where, $data);

        $message = "Berhasil mengubah data diri anda.";
        $data['message'] = $message;
        return redirect()->to('DataDiri')->with('message', $message);
    }
}
