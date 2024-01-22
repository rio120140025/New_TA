<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'no_laporan';
    protected $allowedFields = ['no_laporan', 'waktu_melapor', 'kronologi', 'kerugian', 'alamat_kejadian', 'longitude', 'latitude', 'waktu_kejadian', 'id_status', 'lokasi', 'id_akun', 'id_data_diri', 'id_kendaraan'];

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

    public function getAllLaporanDetails($limit, $offset, $search = null, $filter = null)
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
            $query->like('no_laporan', $search)
                ->orLike('nama', $search);
        }

        if (!empty($filter['lokasi'])) {
            $query->where('lokasi', $filter['lokasi']);
        }

        if (!empty($filter['start_date_kejadian'])) {
            $query->where('waktu_kejadian >=', $filter['start_date_kejadian']);
        }

        if (!empty($filter['end_date_kejadian'])) {
            $query->where('waktu_kejadian <=', $filter['end_date_kejadian']);
        }
        if (!empty($filter['start_date_melapor'])) {
            $query->where('waktu_melapor >=', $filter['start_date_melapor']);
        }

        if (!empty($filter['end_date_melapor'])) {
            $query->where('waktu_melapor <=', $filter['end_date_melapor']);
        }

        if (!empty($filter['tipe_motor'])) {
            $query->where('tipe_motor', $filter['tipe_motor']);
        }

        if (isset($filter['status']) && $filter['status'] !== "") {
            $query->where('id_status', $filter['status']);
        }

        return $query->get()->getResult();
    }

    public function getTotalLaporan($search = null, $filter = null)
    {
        $query = $this->select('*')
            ->join('data_diri', 'laporan.id_data_diri = data_diri.id_data_diri', 'left')
            ->join('subdistricts', 'data_diri.subdis_id = subdistricts.subdis_id', 'left')
            ->join('districts', 'subdistricts.dis_id = districts.dis_id', 'left')
            ->join('cities', 'districts.city_id = cities.city_id', 'left')
            ->join('provinces', 'cities.prov_id = provinces.prov_id', 'left')
            ->join('kendaraan', 'laporan.id_kendaraan = kendaraan.id_kendaraan', 'left')
            ->join('motor', 'kendaraan.id_motor = motor.id_motor', 'left');

        if (!empty($search)) {
            $query->like('no_laporan', $search)
                ->orLike('nama', $search);
        }

        if (!empty($filter['lokasi'])) {
            $this->where('lokasi', $filter['lokasi']);
        }

        if (!empty($filter['start_date_kejadian'])) {
            $this->where('waktu_kejadian >=', $filter['start_date_kejadian']);
        }

        if (!empty($filter['end_date_kejadian'])) {
            $this->where('waktu_kejadian <=', $filter['end_date_kejadian']);
        }

        if (!empty($filter['start_date_melapor'])) {
            $this->where('waktu_melapor >=', $filter['start_date_melapor']);
        }

        if (!empty($filter['end_date_melapor'])) {
            $this->where('waktu_melapor <=', $filter['end_date_melapor']);
        }

        if (!empty($filter['tipe_motor'])) {
            $this->where('tipe_motor', $filter['tipe_motor']);
        }

        if (isset($filter['status']) && $filter['status'] !== "") {
            $this->where('id_status', $filter['status']);
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
        $oneYearAgo = date('Y-m-d', strtotime('-1 year'));

        $query = $this->select('*')
            ->join('data_diri', 'laporan.id_data_diri = data_diri.id_data_diri', 'left')
            ->join('subdistricts', 'data_diri.subdis_id = subdistricts.subdis_id', 'left')
            ->join('districts', 'subdistricts.dis_id = districts.dis_id', 'left')
            ->join('cities', 'districts.city_id = cities.city_id', 'left')
            ->join('provinces', 'cities.prov_id = provinces.prov_id', 'left')
            ->join('kendaraan', 'laporan.id_kendaraan = kendaraan.id_kendaraan', 'left')
            ->join('motor', 'kendaraan.id_motor = motor.id_motor', 'left')
            ->where('(laporan.id_status = 1 OR laporan.id_status = 2)')
            ->where('laporan.waktu_kejadian >=', $oneYearAgo)
            ->get();

        return $query->getResult();
    }

    public function getMotorTypeRatio($filter = null)
    {
        $query = $this->select('motor.tipe_motor, COUNT(*) as jumlah')
            ->join('kendaraan', 'laporan.id_kendaraan = kendaraan.id_kendaraan')
            ->join('motor', 'kendaraan.id_motor = motor.id_motor');

        if (!empty($filter['lokasi'])) {
            $query->where('laporan.lokasi', $filter['lokasi']);
        }

        if (!empty($filter['start_date_kejadian'])) {
            $query->where('laporan.waktu_kejadian >=', $filter['start_date_kejadian']);
        }

        if (!empty($filter['end_date_kejadian'])) {
            $query->where('laporan.waktu_kejadian <=', $filter['end_date_kejadian']);
        }

        if (!empty($filter['start_date_melapor'])) {
            $query->where('laporan.waktu_melapor >=', $filter['start_date_melapor']);
        }

        if (!empty($filter['end_date_melapor'])) {
            $query->where('laporan.waktu_melapor <=', $filter['end_date_melapor']);
        }

        if (!empty($filter['tipe_motor'])) {
            $query->where('motor.tipe_motor', $filter['tipe_motor']);
        }

        if (isset($filter['status']) && $filter['status'] !== "") {
            $query->where('laporan.id_status', $filter['status']);
        }

        $query->groupBy('motor.tipe_motor');
        return $query->get()->getResult();
    }

    public function getMonthlyIncidents($filter = null)
    {
        $query = $this->select("DATE_FORMAT(waktu_kejadian, '%M %Y') as month, COUNT(*) as jumlah")
            ->groupBy("DATE_FORMAT(waktu_kejadian, '%M %Y')");

        if (!empty($filter['lokasi'])) {
            $query->where('laporan.lokasi', $filter['lokasi']);
        }

        if (!empty($filter['start_date_kejadian'])) {
            $query->where('laporan.waktu_kejadian >=', $filter['start_date_kejadian']);
        }

        if (!empty($filter['end_date_kejadian'])) {
            $query->where('laporan.waktu_kejadian <=', $filter['end_date_kejadian']);
        }

        if (!empty($filter['start_date_melapor'])) {
            $query->where('laporan.waktu_melapor >=', $filter['start_date_melapor']);
        }

        if (!empty($filter['end_date_melapor'])) {
            $query->where('laporan.waktu_melapor <=', $filter['end_date_melapor']);
        }

        if (!empty($filter['tipe_motor'])) {
            $query->where('motor.tipe_motor', $filter['tipe_motor']);
        }

        if (isset($filter['status']) && $filter['status'] !== "") {
            $query->where('laporan.id_status', $filter['status']);
        }

        return $query->get()->getResult();
    }

    public function getLokasiData($filter = null)
    {
        $query = $this->select("laporan.lokasi, COUNT(*) as jumlah")
            ->groupBy('laporan.lokasi');

        if (!empty($filter['lokasi'])) {
            $query->where('laporan.lokasi', $filter['lokasi']);
        }

        if (!empty($filter['start_date_kejadian'])) {
            $query->where('laporan.waktu_kejadian >=', $filter['start_date_kejadian']);
        }

        if (!empty($filter['end_date_kejadian'])) {
            $query->where('laporan.waktu_kejadian <=', $filter['end_date_kejadian']);
        }

        if (!empty($filter['start_date_melapor'])) {
            $query->where('laporan.waktu_melapor >=', $filter['start_date_melapor']);
        }

        if (!empty($filter['end_date_melapor'])) {
            $query->where('laporan.waktu_melapor <=', $filter['end_date_melapor']);
        }

        if (!empty($filter['tipe_motor'])) {
            $query->where('motor.tipe_motor', $filter['tipe_motor']);
        }

        if (isset($filter['status']) && $filter['status'] !== "") {
            $query->where('laporan.id_status', $filter['status']);
        }

        return $query->get()->getResult();
    }

    public function getMotorTypeRatioStatus()
    {
        $oneYearAgo = date('Y-m-d', strtotime('-1 year'));

        $query = $this->select('motor.tipe_motor, COUNT(*) as jumlah')
            ->join('kendaraan', 'laporan.id_kendaraan = kendaraan.id_kendaraan')
            ->join('motor', 'kendaraan.id_motor = motor.id_motor')
            ->where('(laporan.id_status = 1 OR laporan.id_status = 2)')
            ->where('laporan.waktu_kejadian >=', $oneYearAgo)
            ->groupBy('motor.tipe_motor')
            ->get();

        return $query->getResult();
    }

    public function getMonthlyIncidentsStatus()
    {
        $oneYearAgo = date('Y-m-d', strtotime('-1 year'));

        $query = $this->select("DATE_FORMAT(waktu_kejadian, '%M %Y') as month, COUNT(*) as jumlah")
            ->where('(laporan.id_status = 1 OR laporan.id_status = 2)')
            ->where('laporan.waktu_kejadian >=', $oneYearAgo)
            ->groupBy("DATE_FORMAT(waktu_kejadian, '%M %Y')")
            ->get();

        return $query->getResult();
    }

    public function getLokasiDataStatus()
    {
        $oneYearAgo = date('Y-m-d', strtotime('-1 year'));

        $query = $this->select("laporan.lokasi, COUNT(*) as jumlah")
            ->where('(laporan.id_status = 1 OR laporan.id_status = 2)')
            ->where('laporan.waktu_kejadian >=', $oneYearAgo)
            ->groupBy('laporan.lokasi')
            ->get();

        return $query->getResult();
    }
}
