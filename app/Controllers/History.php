<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LaporanModel;
use App\Models\DataDiriModel;
use App\Models\DataProvinsiModel;
use App\Models\DataKabupatenKotaModel;
use App\Models\DataKecamatanModel;
use App\Models\DataKelurahanDesaModel;
use App\Models\DataMotorModel;
use App\Models\DataTipeMotorModel;

class History extends Controller
{
    protected $session;
    protected $laporanModel;
    protected $datadiriModel;
    protected $dataprovinsiModel;
    protected $datakabupatenkotaModel;
    protected $datakecamatanModel;
    protected $datakelurahandesaModel;
    protected $datamotorModel;
    protected $datatipemotorModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->laporanModel = new LaporanModel();
        $this->datadiriModel = new DataDiriModel();
        $this->dataprovinsiModel = new DataProvinsiModel();
        $this->datakabupatenkotaModel = new DataKabupatenKotaModel();
        $this->datakecamatanModel = new DataKecamatanModel();
        $this->datakelurahandesaModel = new DataKelurahanDesaModel();
        $this->datamotorModel = new DataMotorModel();
        $this->datatipemotorModel = new DataTipeMotorModel();

    }
    public function index()
    {
        if ($this->session->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        return view('v_History');
    }

    public function search_history()
    {
        $no_laporan = $this->request->getPost('searchNoLaporan');
        $no_hp = $this->request->getPost('searchNoHP');

        $data['laporan'] = $this->laporanModel->getLaporanDetails($no_laporan);

        if ($data['laporan'] != null && $data['laporan']['id_akun'] == null) {
            if ($data['laporan']['no_hp'] == $no_hp && $data['laporan']['alamat_kejadian'] != null) {
                return view('v_Detail_Laporan', $data);
            } elseif ($data['laporan']['no_hp'] == $no_hp && $data['laporan']['alamat_kejadian'] == null) {
                $data['provinsi'] = $this->dataprovinsiModel->getProvinsiData(null, null, null);
                $data['kabupatenkota'] = $this->datakabupatenkotaModel->getKabupatenKotaData(null, null, null);
                $data['kecamatan'] = $this->datakecamatanModel->getKecamatanData(null, null, null);
                $data['kelurahandesa'] = $this->datakelurahandesaModel->getKelurahanDesaData(null, null, null);
                $data['motor'] = $this->datatipemotorModel->getTipeMotorData(null, null, null);
                return view('v_Update_Laporan', $data);
            } else {
                $message = "Data yang anda masukkan salah.";
                return redirect()->to('history')->with('message', $message);
            }
        } else {
            $message = "Data yang anda masukkan salah.";
            return redirect()->to('history')->with('message', $message);
        }
    }

    public function update_laporan()
    {
        $id_data_diri = $this->request->getPost('id_data_diri');
        $nik = $this->request->getPost('nik');
        $agama = $this->request->getPost('agama');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $alamat = $this->request->getPost('alamat');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $pekerjaan = $this->request->getPost('pekerjaan');
        $subdis_id = $this->request->getPost('subdis_id');

        $data = [
            'nik' => $nik,
            'agama' => $agama,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => $alamat,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'pekerjaan' => $pekerjaan,
            'subdis_id' => $subdis_id,
        ];

        $where1 = ['id_data_diri' => $id_data_diri];
        $this->datadiriModel->updateData($where1, $data);

        $id_kendaraan = $this->request->getPost('id_kendaraan');
        $no_rangka = $this->request->getPost('no_rangka');
        $no_mesin = $this->request->getPost('no_mesin');
        $warna = $this->request->getPost('warna');
        $id_motor = $this->request->getPost('id_motor');

        $data = [
            'no_rangka' => $no_rangka,
            'no_mesin' => $no_mesin,
            'warna' => $warna,
            'id_motor' => $id_motor,
        ];
        $where2 = ['id_kendaraan' => $id_kendaraan];
        $this->datamotorModel->updateData($where2, $data);

        $no_laporan = $this->request->getPost('no_laporan');
        $kronologi = $this->request->getPost('kronologi');
        $kerugian = $this->request->getPost('kerugian');
        $alamat_kejadian = $this->request->getPost('alamat_kejadian');

        $data = [
            'kronologi' => $kronologi,
            'kerugian' => $kerugian,
            'alamat_kejadian' => $alamat_kejadian,
        ];

        $where3 = ['no_laporan' => $no_laporan];
        $result = $this->laporanModel->updateLaporan($where3, $data);

        if ($result) {
            $message = "Berhasil melengkapi data laporan.";
            return redirect()->to('history')->with('message', $message);
        } else {
            $message = "Gagal melengkapi data laporan.";
            return redirect()->to('history')->with('message', $message);
        }
    }
}
