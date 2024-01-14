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

    public function getAllLaporanDetails($limit, $offset, $search = null)
    {
        $query = $this->select('*')
            ->join('data_diri', 'laporan.id_data_diri = data_diri.id_data_diri', 'left')
            ->join('subdistricts', 'data_diri.subdis_id = subdistricts.subdis_id', 'left')
            ->join('districts', 'subdistricts.dis_id = districts.dis_id', 'left')
            ->join('cities', 'districts.city_id = cities.city_id', 'left')
            ->join('provinces', 'cities.prov_id = provinces.prov_id', 'left')
            ->join('kendaraan', 'laporan.id_kendaraan = kendaraan.id_kendaraan', 'left')
            ->join('motor', 'kendaraan.id_motor = motor.id_motor', 'left');

        $query->limit($limit, $offset);

        if (!empty($search)) {
            $query->like('no_laporan', $search);
        }

        return $query->get()->getResult();
    }

    public function getTotalLaporan()
    {
        return $this->countAll();
    }

    public function getTotalSearchedLaporan($search = null)
    {
        if (!empty($search)) {
            $this->like('no_laporan', $search);
        }
        return $this->countAllResults();
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

    public function getAllLaporanDetailsStatus()
    {
        $query = $this->select('*')
            ->join('data_diri', 'laporan.id_data_diri = data_diri.id_data_diri', 'left')
            ->join('subdistricts', 'data_diri.subdis_id = subdistricts.subdis_id', 'left')
            ->join('districts', 'subdistricts.dis_id = districts.dis_id', 'left')
            ->join('cities', 'districts.city_id = cities.city_id', 'left')
            ->join('provinces', 'cities.prov_id = provinces.prov_id', 'left')
            ->join('kendaraan', 'laporan.id_kendaraan = kendaraan.id_kendaraan', 'left')
            ->join('motor', 'kendaraan.id_motor = motor.id_motor', 'left')
            ->where('laporan.id_status', '1')
            ->orWhere('laporan.id_status', '2')
            ->get();

        return $query->getResult();
    }

    public function getMotorTypeRatioStatus()
    {
        $query = $this->select('motor.tipe_motor, COUNT(*) as jumlah')
            ->join('kendaraan', 'laporan.id_kendaraan = kendaraan.id_kendaraan')
            ->join('motor', 'kendaraan.id_motor = motor.id_motor')
            ->where('laporan.id_status', '1')
            ->orWhere('laporan.id_status', '2')
            ->groupBy('motor.tipe_motor')
            ->get();

        return $query->getResult();
    }

    public function getMonthlyIncidentsStatus()
    {
        $query = $this->select("DATE_FORMAT(waktu_kejadian, '%M %Y') as month, COUNT(*) as jumlah")
            ->where('laporan.id_status', '1')
            ->orWhere('laporan.id_status', '2')
            ->groupBy("DATE_FORMAT(waktu_kejadian, '%M %Y')")
            ->get();

        return $query->getResult();
    }

    public function getSubdistrictDataStatus()
    {
        $query = $this->select("subdistricts.subdis_id, subdistricts.subdis_name, COUNT(*) as jumlah")
            ->join('subdistricts', 'laporan.subdis_id = subdistricts.subdis_id')
            ->where('laporan.id_status', '1')
            ->orWhere('laporan.id_status', '2')
            ->groupBy('subdistricts.subdis_id')
            ->get();

        return $query->getResult();
    }
}
