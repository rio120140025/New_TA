<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Sukses extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function index($no_laporan)
    {
        $no_laporan = str_replace('-', '/', $no_laporan);
        $no_laporan = str_replace('%20', ' ', $no_laporan);

        $data['no_laporan'] = $no_laporan;

        if ($this->session->get('logged_in')) {
            return view('User/v_Sukses', $data);
        } else {
            return view('v_Sukses', $data);
        }
    }
}
