<?php

namespace App\Models;

use CodeIgniter\Model;

class DataMotorModel extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $allowedFields = ['no_plat', 'no_rangka', 'no_mesin', 'warna', 'id_akun', 'id_motor'];

    public function getMotorDataWithTipeMotor($id_akun)
    {
        return $this->select('kendaraan.*, motor.tipe_motor')
            ->join('motor', 'motor.id_motor = kendaraan.id_motor')
            ->where('kendaraan.id_akun', $id_akun)
            ->findAll();
    }

    public function insertMotor($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function updateData($where, $data)
    {
        return $this->update($where, $data);
    }
    
    public function deleteMotor($id)
    {
        $this->where('id_kendaraan', $id)->delete();
    }
}
