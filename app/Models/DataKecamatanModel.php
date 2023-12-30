<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKecamatanModel extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'dis_id';
    protected $allowedFields = ['dis_name', 'city_id'];

    public function getKecamatanData($limit, $offset, $search = null)
    {
        $this->select('districts.*, cities.city_name');
        $this->join('cities', 'cities.city_id = districts.city_id', 'left');

        $this->select('cities.*, provinces.prov_name');
        $this->join('provinces', 'provinces.prov_id = cities.prov_id', 'left');

        $this->limit($limit, $offset);

        if (!empty($search)) {
            $this->like('dis_name', $search);
        }

        $query = $this->get();
        return $query->getResult();
    }

    public function getKecamatanByKabupatenkota($city_id)
    {
        $this->where('city_id', $city_id);
        $query = $this->get();
        return $query->getResult();
    }

    public function getTotalKecamatan()
    {
        return $this->countAll();
    }

    public function getTotalSearchedKecamatan($search = null)
    {
        if (!empty($search)) {
            $this->like('dis_name', $search);
        }
        return $this->countAllResults();
    }

    public function insertKecamatanData($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function deleteKecamatanData($id)
    {
        $this->where('dis_id', $id);
        $this->delete();
    }
}
