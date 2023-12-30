<?php

namespace App\Models;

use CodeIgniter\Model;

class DataDiriModel extends Model
{
    protected $table = 'data_diri';
    protected $primaryKey = 'id_data_diri';
    protected $allowedFields = ['nik', 'nama', 'agama', 'jenis_kelamin', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'pekerjaan', 'subdis_id'];

    public function getDataByAkunId($id_akun)
    {
        return $this->where('id_akun', $id_akun)->first();
    }

    public function getUserLocationBySubdisId($id)
    {
        return $this->select('data_diri.subdis_id, subdistricts.dis_id, districts.city_id, cities.prov_id')
            ->join('subdistricts', 'subdistricts.subdis_id = data_diri.subdis_id')
            ->join('districts', 'districts.dis_id = subdistricts.dis_id')
            ->join('cities', 'cities.city_id = districts.city_id')
            ->join('provinces', 'provinces.prov_id = cities.prov_id')
            ->where('data_diri.subdis_id', $id)
            ->first();
    }

    public function updateData($where, $data)
    {
        return $this->update($where, $data);
    }
}
