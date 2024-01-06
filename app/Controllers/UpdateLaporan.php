<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\LaporanModel;
use App\Models\DataDiriModel;
use App\Models\DataProvinsiModel;
use App\Models\DataKabupatenKotaModel;
use App\Models\DataKecamatanModel;
use App\Models\DataKelurahanDesaModel;
use App\Models\DataTipeMotorModel;
use App\Models\DataMotorModel;

class UpdateLaporan extends Controller
{
    protected $session;
    protected $loginModel;
    protected $laporanModel;
    protected $datatipemotorModel;
    protected $datamotorModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->loginModel = new LoginModel();
        $this->laporanModel = new LaporanModel();
        $this->datadiriModel = new DataDiriModel();
        $this->dataprovinsiModel = new DataProvinsiModel();
        $this->datakabupatenkotaModel = new DataKabupatenKotaModel();
        $this->datakecamatanModel = new DataKecamatanModel();
        $this->datakelurahandesaModel = new DataKelurahanDesaModel();
        $this->datatipemotorModel = new DataTipeMotorModel();
        $this->datamotorModel = new DataMotorModel();

    }
    public function index($no_laporan)
    {
        if (!$this->session->get('logged_in')) {
            return view('errors/html/error_404');
        }

        $id_akun = $this->session->get('id_akun');

        $no_laporan = str_replace('-', '/', $no_laporan);
        $no_laporan = str_replace('%20', ' ', $no_laporan);

        $data['no_laporan'] = $no_laporan;
        $data['laporan'] = $this->laporanModel->getLaporanDetails($no_laporan);


        if ($data['laporan'] == null) {
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

                $location = $this->datadiriModel->getUserLocationBySubdisId($data['laporan']['subdis_id']);

                return view('Admin/v_Update_Laporan', $data + ['location' => $location]);
            } elseif ($id_role == 2) {
                if ($id_akun == $data['laporan']['id_akun'] && $data['laporan']['alamat_kejadian'] == null) {
                    return view('User/v_Update_Laporan', $data);
                } else {
                    return view('errors/html/error_404');
                }
            }
        }
    }
    public function update_laporan()
    {
        $email = $this->session->get('email');
        $user = $this->loginModel->getUser($email);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role == 1) {
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

                $where1 = ['id_data_diri' => $id_data_diri];
                $this->datadiriModel->updateData($where1, $data);

                $id_kendaraan = $this->request->getPost('id_kendaraan');
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

                $no_laporan = str_replace('/', '-', $no_laporan);

                if ($result) {
                    $message = "Berhasil mengubah data laporan.";
                    return redirect()->to('detaillaporan/' . $no_laporan)->with('message', $message);
                } else {
                    $message = "Gagal mengubah data laporan.";
                    return redirect()->to('detaillaporan/' . $no_laporan)->with('message', $message);
                }
            } elseif ($id_role == 2) {
                $no_laporan = $this->request->getPost('no_laporan');
                $kronologi = $this->request->getPost('kronologi');
                $kerugian = $this->request->getPost('kerugian');
                $alamat_kejadian = $this->request->getPost('alamat_kejadian');

                $data = [
                    'kronologi' => $kronologi,
                    'kerugian' => $kerugian,
                    'alamat_kejadian' => $alamat_kejadian,
                ];

                $where = ['no_laporan' => $no_laporan];
                $result = $this->laporanModel->updateLaporan($where, $data);

                if ($result) {
                    $message = "Berhasil melengkapi data laporan.";
                    return redirect()->to('Dashboard')->with('message', $message);
                } else {
                    $message = "Gagal melengkapi data laporan.";
                    return redirect()->to('Dashboard')->with('message', $message);
                }
            }
        }
    }
}
