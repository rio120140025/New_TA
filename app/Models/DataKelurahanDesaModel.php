<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKelurahanDesaModel extends Model
{
    protected $table = 'subdistricts';
    protected $primaryKey = 'subdis_id';
    protected $allowedFields = ['subdis_name', 'dis_id'];

    public function getKelurahanDesaData($limit, $offset, $search = null)
    {
        $this->select('subdistricts.*, districts.dis_name');
        $this->join('districts', 'districts.dis_id = subdistricts.dis_id', 'left');

        $this->select('districts.*, cities.city_name');
        $this->join('cities', 'cities.city_id = districts.city_id', 'left');

        $this->select('cities.*, provinces.prov_name');
        $this->join('provinces', 'provinces.prov_id = cities.prov_id', 'left');

        $this->limit($limit, $offset);

        if (!empty($search)) {
            $this->like('subdis_name', $search)
                ->orLike('dis_name', $search)
                ->orLike('city_name', $search)
                ->orLike('prov_name', $search);
        }

        $query = $this->get();
        return $query->getResult();
    }

    public function getKelurahandesaByKecamatan($dis_id)
    {
        $this->where('dis_id', $dis_id);
        $query = $this->get();
        return $query->getResult();
    }

    public function getTotalKelurahandesa()
    {
        return $this->countAll();
    }

    public function getTotalSearchedKelurahandesa($search = null)
    {
        if (!empty($search)) {
            $this->like('subdis_name', $search);
        }
        return $this->countAllResults();
    }

    public function insertKelurahanDesaData($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function deleteKelurahanDesaData($id)
    {
        $this->where('subdis_id', $id)->delete();
    }
}
