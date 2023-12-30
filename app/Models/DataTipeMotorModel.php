<?php

namespace App\Models;

use CodeIgniter\Model;

class DataTipeMotorModel extends Model
{
    protected $table = 'motor';
    protected $primaryKey = 'id_motor';
    protected $allowedFields = ['tipe_motor'];

    public function getTipeMotorData($limit, $offset, $search = null)
    {
        $this->limit($limit, $offset);

        if (!empty($search)) {
            $this->like('tipe_motor', $search);
        }

        $query = $this->get();
        return $query->getResult();
    }

    public function getTipeTotalMotor()
    {
        return $this->countAll();
    }

    public function getTotalSearchedTipeMotor($search = null)
    {
        if (!empty($search)) {
            $this->like('tipe_motor', $search);
        }

        return $this->countAllResults();
    }

    public function insertTipeMotorData($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    public function deleteTipeMotorData($id)
    {
        $this->where('id_motor', $id)->delete();
    }
}
