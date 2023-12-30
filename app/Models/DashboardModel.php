<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'no_laporan';
    protected $allowedFields = ['nama', 'id_motor', 'subdis_id', 'status'];

    public function getLaporan($limit, $offset, $search = null, $filter = null, $idDistrictsKejadian = null, $idSubdistrictsKejadian = null)
    {
        $builder = $this->builder();
        $builder->limit($limit, $offset);

        if (!empty($search)) {
            $search = $this->db->escapeLikeString($search);

            $builder->groupStart()
                ->like('no_laporan', $search)
                ->orLike('data_diri.nama', $search)
                ->orLike('motor.tipe_motor', $search)
                ->orLike('districts.dis_name', $search)
                ->orLike('subdistricts.subdis_name', $search)
                ->groupEnd();

            $builder->orLike('id_districts_kejadian', $search)
                ->orLike('id_subdistricts_kejadian', $search);
        }

        if (!empty($filter)) {
            switch ($filter) {
                case 'today':
                    $builder->where('DATE(waktu_melapor)', date('Y-m-d'));
                    break;
                case 'last_7_days':
                    $builder->where('waktu_melapor >=', date('Y-m-d', strtotime('-7 days')));
                    break;
                case 'last_30_days':
                    $builder->where('waktu_melapor >=', date('Y-m-d', strtotime('-30 days')));
                    break;
                case 'status_2':
                    $builder->where('status', 2);
                    break;
            }
        }

        if (!empty($idSubdistrictsKejadian) && !empty($idDistrictsKejadian)) {
            $idSubdistrictsKejadian = $this->db->escapeLikeString($idSubdistrictsKejadian);
            $idDistrictsKejadian = $this->db->escapeLikeString($idDistrictsKejadian);

            $builder->groupStart()
                ->like('id_subdistricts_kejadian', $idSubdistrictsKejadian)
                ->where('id_districts_kejadian', $idDistrictsKejadian)
                ->groupEnd();
        } elseif (!empty($idDistrictsKejadian)) {
            $idDistrictsKejadian = $this->db->escapeLikeString($idDistrictsKejadian);
            $builder->like('id_districts_kejadian', $idDistrictsKejadian);
        }

        $builder->join('motor', 'motor.id_motor = laporan.id_motor', 'left');
        $builder->join('districts', 'districts.dis_id = laporan.id_districts_kejadian', 'left');
        $builder->join('subdistricts', 'subdistricts.subdis_id = laporan.id_subdistricts_kejadian', 'left');

        $laporan = $builder->get()->getResultObject();

        foreach ($laporan as &$row) {
            $row->tipe_motor = $this->getMotorTypeById($row->id_motor);
            $row->dis_name = $this->getKecamatanTypeById($row->id_districts_kejadian);
            $row->subdis_name = $this->getKelurahanDesaTypeById($row->id_subdistricts_kejadian);
        }

        return $laporan;
    }

    public function getTotalLaporan()
    {
        $totalAll = $this->countAll();
        $totalToday = $this->where('DATE(waktu_melapor)', date('Y-m-d'))->countAllResults();
        $totalLast7Days = $this->where('waktu_melapor >=', date('Y-m-d', strtotime('-7 days')))->countAllResults();
        $totalLast30Days = $this->where('waktu_melapor >=', date('Y-m-d', strtotime('-30 days')))->countAllResults();
        $totalStatus2 = $this->where('status', 2)->countAllResults();

        return [
            'totalAll' => $totalAll,
            'totalToday' => $totalToday,
            'totalLast7Days' => $totalLast7Days,
            'totalLast30Days' => $totalLast30Days,
            'totalStatus2' => $totalStatus2,
        ];
    }

    public function getMotorTypeById($idMotor)
    {
        $motor = $this->db->table('motor')->select('tipe_motor')->where('id_motor', $idMotor)->get()->getRow();
        return $motor ? $motor->tipe_motor : null;
    }

    public function getKecamatanTypeById($idDistrictsKejadian)
    {
        $districts = $this->db->table('districts')->select('dis_name')->where('dis_id', $idDistrictsKejadian)->get()->getRow();
        return $districts ? $districts->dis_name : null;
    }

    public function getKelurahanDesaTypeById($idSubdistrictsKejadian)
    {
        $subdistricts = $this->db->table('subdistricts')->select('subdis_name')->where('subdis_id', $idSubdistrictsKejadian)->get()->getRow();
        return $subdistricts ? $subdistricts->subdis_name : null;
    }
}
