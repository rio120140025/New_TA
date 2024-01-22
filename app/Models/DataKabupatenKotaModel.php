<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKabupatenKotaModel extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'city_id';
    protected $allowedFields = ['city_name', 'prov_id'];

    public function getKabupatenKotaData($limit, $offset, $search = null)
    {
        $this->select('cities.*, provinces.prov_name');
        $this->join('provinces', 'provinces.prov_id = cities.prov_id', 'left');

        $this->limit($limit, $offset);

        if (!empty($search)) {
            $this->like('city_name', $search)
                ->orLike('prov_name', $search);
        }

        $query = $this->get();
        return $query->getResult();
    }

    public function getKabupatenKotaByProvinsi($prov_id)
    {
        $this->where('prov_id', $prov_id);
        return $this->findAll();
    }

    public function getTotalKabupatenKota()
    {
        return $this->countAll();
    }

    public function getTotalSearchedKabupatenKota($search = null)
    {
        if (!empty($search)) {
            $this->like('city_name', $search);
        }
        return $this->countAllResults();
    }

    public function insertKabupatenKotaData($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    public function deleteKabupatenKotaData($id)
    {
        $this->where('city_id', $id)->delete();
    }
}
