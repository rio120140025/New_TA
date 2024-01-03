<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'no_laporan';
    protected $allowedFields = ['no_laporan', 'waktu_melapor', 'kronologi', 'kerugian', 'alamat_kejadian', 'longitude', 'latitude', 'waktu_kejadian', 'status', 'subdis_id', 'id_akun', 'id_data_diri', 'id_kendaraan'];

    public function insertLaporan($data)
    {
        $this->insert($data);
    }

    public function countLaporan()
    {
        return $this->countAll();
    }
}
