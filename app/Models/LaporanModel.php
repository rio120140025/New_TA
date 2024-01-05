<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'no_laporan';
    protected $allowedFields = ['no_laporan', 'waktu_melapor', 'kronologi', 'kerugian', 'alamat_kejadian', 'longitude', 'latitude', 'waktu_kejadian', 'id_status', 'subdis_id', 'id_akun', 'id_data_diri', 'id_kendaraan'];

    public function insertLaporan($data)
    {
        $this->insert($data);
    }

    public function countLaporan()
    {
        return $this->countAll();
    }

    public function getLaporanByNoLaporan($no_laporan)
    {
        return $this->where('no_laporan', $no_laporan)->first();
    }

    public function getLaporanDetails($no_laporan)
    {
        return $this->select('*')
            ->join('data_diri', 'laporan.id_data_diri = data_diri.id_data_diri', 'left')
            ->join('subdistricts', 'data_diri.subdis_id = subdistricts.subdis_id', 'left')
            ->join('districts', 'subdistricts.dis_id = districts.dis_id', 'left')
            ->join('cities', 'districts.city_id = cities.city_id', 'left')
            ->join('provinces', 'cities.prov_id = provinces.prov_id', 'left')
            ->join('kendaraan', 'laporan.id_kendaraan = kendaraan.id_kendaraan', 'left')
            ->join('motor', 'kendaraan.id_motor = motor.id_motor', 'left')
            ->where('laporan.no_laporan', $no_laporan)
            ->first();
    }

    public function updateLaporan($where, $data)
    {
        return $this->update($where, $data);
    }
}
