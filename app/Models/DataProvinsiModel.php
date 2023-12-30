<?php

namespace App\Models;

use CodeIgniter\Model;

class DataProvinsiModel extends Model
{
    protected $table = 'provinces';
    protected $primaryKey = 'prov_id';
    protected $allowedFields = ['prov_name'];

    public function getProvinsiData($limit, $offset, $search = null)
    {
        $this->limit($limit, $offset);

        if (!empty($search)) {
            $this->like('prov_name', $search);
        }

        $query = $this->get();
        return $query->getResult();
    }

    public function getTotalProvinsi()
    {
        return $this->countAll();
    }

    public function getTotalSearchedProvinsi($search = null)
    {
        if (!empty($search)) {
            $this->like('prov_name', $search);
        }
        return $this->countAllResults();
    }

    public function insertProvinsiData($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    public function deleteProvinsiData($id)
    {
        $this->where('prov_id', $id)->delete();
    }
}
