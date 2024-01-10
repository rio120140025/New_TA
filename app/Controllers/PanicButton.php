<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;
use App\Models\DataMotorModel;
use App\Models\LaporanModel;
use App\Models\DataDiriModel;

class PanicButton extends Controller
{
    protected $session;
    protected $logimModel;
    protected $datamotorModel;
    protected $laporanModel;
    protected $datadiriModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->loginModel = new LoginModel();
        $this->datamotorModel = new DataMotorModel();
        $this->laporanModel = new LaporanModel();
        $this->datadiriModel = new DataDiriModel();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return view('v_Panic_Button');
        }

        $email = $this->session->get('email');
        $user = $this->loginModel->getUser($email);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role = 1) {
                return redirect()->to('Dashboard/1');
            } elseif ($id_role == 2) {
                $id_akun = $this->session->get('id_akun');
                $data['kendaraan'] = $this->datamotorModel->getMotorDataWithTipeMotor($id_akun);

                return view('User/v_Panic_Button', $data);
            }
        }
    }

    public function insert_data()
    {
        $id_akun = $this->session->get('id_akun');
        $data_diri = $this->datadiriModel->getDataByAkunId($id_akun);
        $email = $this->session->get('email');
        $nomor_laporan = $this->generate_nomor_laporan();
        $waktu_lapor = date('Y-m-d H:i:s');

        $this->laporanModel->insertLaporan([
            'no_laporan' => $nomor_laporan,
            'id_akun' => $id_akun,
            'id_data_diri' => $data_diri['id_data_diri'],
            'id_kendaraan' => $this->request->getPost('id_kendaraan'),
            'waktu_kejadian' => $this->request->getPost('waktu_kejadian'),
            // 'subdis_id' => $this->request->getPost('subdis_id'),
            'longitude' => $this->request->getPost('longitude'),
            'latitude' => $this->request->getPost('latitude'),
            'waktu_melapor' => $waktu_lapor
        ]);

        $no_laporan = str_replace('/', '-', $nomor_laporan);

        $emailService = service('email');
        $emailService->setTo($email);
        $emailService->setFrom('iniemail.noreply@gmail.com', 'Polres Lampung Utara');
        $emailService->setSubject('Pengaduan Pencurian Sepeda Motor');
        $emailService->setMessage("Laporan anda telah diterima oleh pihak RESKRIM POLRES LAMPUNG UTARA. <br> Nomor Laporan Anda: <strong>$nomor_laporan</strong> <br> Anda dapat melihat riwayat laporan pada website dan silahkan untuk melengkapi laporan anda dengan menggunakan akun yang sama pada saat melapor. <br><br> POLRES LAMPUNG UTARA");
        $emailService->send();

        return redirect()->to('sukses/' . $no_laporan);
    }

    public function insert_data_not_login()
    {
        $nomor_laporan = $this->generate_nomor_laporan();
        $waktu_lapor = date('Y-m-d H:i:s');

        $id_data_diri = $this->datadiriModel->insert([
            'nama' => $this->request->getPost('nama'),
            'no_hp' => $this->request->getPost('no_hp'),
        ]);

        $id_kendaraan = $this->datamotorModel->insert([
            'no_plat' => $this->request->getPost('no_plat'),
        ]);

        $this->laporanModel->insertLaporan([
            'no_laporan' => $nomor_laporan,
            'id_data_diri' => $id_data_diri,
            'id_kendaraan' => $id_kendaraan,
            'waktu_kejadian' => $this->request->getPost('waktu_kejadian'),
            // 'subdis_id' => $this->request->getPost('subdis_id'),
            'longitude' => $this->request->getPost('longitude'),
            'latitude' => $this->request->getPost('latitude'),
            'waktu_melapor' => $waktu_lapor
        ]);

        $no_laporan = str_replace('/', '-', $nomor_laporan);
        return redirect()->to('sukses/' . $no_laporan);
    }
    public function tambah_data()
    {
        $nomor_laporan = $this->generate_nomor_laporan();
        $waktu_lapor = date('Y-m-d H:i:s');

        $id_data_diri = $this->datadiriModel->insert([
            'nik' => $this->request->getPost('nik'),
            'nama' => $this->request->getPost('nama'),
            'agama' => $this->request->getPost('agama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            // 'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_hp' => $this->request->getPost('no_hp'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'subdis_id' => $this->request->getPost('subdis_id'),
        ]);

        $id_kendaraan = $this->datamotorModel->insert([
            'no_plat' => $this->request->getPost('no_plat'),
            'no_rangka' => $this->request->getPost('no_rangka'),
            'no_mesin' => $this->request->getPost('no_mesin'),
            'warna' => $this->request->getPost('warna'),
            'id_motor' => $this->request->getPost('id_motor'),
        ]);

        $this->laporanModel->insertLaporan([
            'no_laporan' => $nomor_laporan,
            'id_data_diri' => $id_data_diri,
            'id_kendaraan' => $id_kendaraan,
            'waktu_kejadian' => $this->request->getPost('waktu_kejadian'),
            'alamat_kejadian' => $this->request->getPost('alamat_kejadian'),
            'kronologi' => $this->request->getPost('kronologi'),
            // 'subdis_id' => $this->request->getPost('subdis_id'),
            'waktu_melapor' => $waktu_lapor
        ]);

        $no_laporan = str_replace('/', '-', $nomor_laporan);
        return redirect()->to('detaillaporan/' . $no_laporan);
    }

    private function generate_nomor_laporan()
    {
        $bulan = date('m');
        $tahun = date('Y');

        $countLaporan = $this->laporanModel->countLaporan();
        $newLaporan = $countLaporan + 1;

        $bulanRomawi = $this->angka_romawi($bulan);

        $nomorLaporan = 'LP/B/' . $newLaporan . '/' . $bulanRomawi . '/' . $tahun . '/SPKT/POLRES LAMPUNG UTARA/POLDA LAMPUNG';

        return $nomorLaporan;
    }

    private function angka_romawi($n)
    {
        $hasil = '';
        $angkaRomawi = [
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        ];

        foreach ($angkaRomawi as $romawi => $angka) {
            while ($n >= $angka) {
                $hasil .= $romawi;
                $n -= $angka;
            }
        }

        return $hasil;
    }
}
