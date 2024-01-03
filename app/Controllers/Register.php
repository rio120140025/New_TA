<?php

namespace App\Controllers;

use App\Models\RegisterModel;
use App\Models\DataDiriModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        echo view('User/v_Register');
    }

    public function process_register()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $registerModel = new RegisterModel();
        $existingUser = $registerModel->where('email', $email)->first();

        if ($existingUser) {
            $message = "Email sudah terdaftar!";
            $data['message'] = $message;
            return redirect()->to('register')->with('message', $message);
        }

        $otp = rand(100000, 999999);
        $this->session->set('otp', $otp);
        $this->session->set('nama', $nama);
        $this->session->set('email', $email);
        $this->session->set('password', $password);

        $emailService = service('email');
        $emailService->setTo($email);
        $emailService->setFrom('iniemail.noreply@gmail.com', 'Polres Lampung Utara');
        $emailService->setSubject('Verifikasi Kode OTP');
        $emailService->setMessage("Kode OTP Anda: $otp");
        $emailService->send();

        return redirect()->to('Register/register_verification');
    }

    public function register_verification()
    {
        return view('User/v_Register_Verification');
    }

    public function verify_otp()
    {
        $user_otp = $this->request->getPost('otp');
        $stored_otp = $this->session->get('otp');
        $nama = $this->session->get('nama');
        $email = $this->session->get('email');
        $password = $this->session->get('password');

        $registerModel = new RegisterModel();

        if ($user_otp == $stored_otp) {
            $akun_id = $registerModel->insert([
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'id_role' => 2
            ]);

            $dataDiriModel = new DataDiriModel();
            $dataDiriModel->insert([
                'nama' => $nama,
                'id_akun' => $akun_id
            ]);

            $this->session->remove(['otp', 'email', 'password']);

            $message = "Registrasi anda berhasil, silahkan log in";
            $data['message'] = $message;
            return redirect()->to('login')->with('message', $message);
        } else {
            $message = "Kode OTP tidak valid!";
            $data['message'] = $message;
            return view('User/v_Register_Verification', $data);
        }
    }
}
