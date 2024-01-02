<?php

namespace App\Controllers;

use App\Models\ForgotModel;
use CodeIgniter\Controller;

class Forgot extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('v_Lupa_Password');
    }

    public function process_reset()
    {
        $email = $this->request->getPost('email');

        $forgotModel = new ForgotModel();
        $existingUser = $forgotModel->where('email', $email)->first();

        if ($existingUser) {
            $otp = rand(100000, 999999);
            $this->session->set('otp', $otp);
            $this->session->set('email', $email);

            $emailService = service('email');
            $emailService->setTo($email);
            $emailService->setFrom('iniemail.noreply@gmail.com', 'Polres Lampung Utara');
            $emailService->setSubject('Verifikasi Kode OTP');
            $emailService->setMessage("Kode OTP Anda: $otp");
            $emailService->send();

            return redirect()->to('Forgot/verification');
        } else {
            $message = "Email yang Anda masukkan tidak terdaftar.";
            $data['message'] = $message;
            return redirect()->to('forgot')->with('message', $message);
        }
    }

    public function verification()
    {
        return view('v_Lupa_Password_Verification');
    }

    public function verify_otp()
    {
        $user_otp = $this->request->getPost('otp');
        $stored_otp = $this->session->get('otp');
        $email = $this->session->get('email');

        if ($user_otp == $stored_otp) {
            return view('v_Reset_Password');
        } else {
            $message = "Kode OTP tidak valid!";
            $data['message'] = $message;
            return view('v_Lupa_Password_Verification', $data);
        }
    }

    public function reset_password()
    {
        $email = $this->session->get('email');
        $password = $this->request->getPost('password');

        $forgotModel = new ForgotModel();
        $forgotModel->updatePassword($email, $password);

        $this->session->remove(['otp', 'email']);

        if ($this->session->get('logged_in')) {
            $this->session->remove(['logged_in']);
        }

        $message = "Password berhasil diubah.";
        $data['message'] = $message;
        return redirect()->to('login')->with('message', $message);
    }
}
