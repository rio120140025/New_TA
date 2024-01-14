<?php

namespace App\Controllers;

use App\Models\AkunModel;
use App\Models\LoginModel;
use App\Models\RegisterModel;
use CodeIgniter\Controller;

class UbahAkun extends Controller
{
    protected $session;
    protected $loginModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        if (!$this->session->get('logged_in')) {
            return redirect()->to(base_url('login'));
        }

        $data['email'] = $this->session->get('email');
        $user = $this->loginModel->getUser($data['email']);

        if ($user) {
            $id_role = $user->id_role;
            if ($id_role == 1) {
                return view('Admin/v_Ubah_Akun', $data);
            } elseif ($id_role == 2) {
                return view('User/v_Ubah_Akun', $data);
            }
        }
    }

    public function process_update()
    {
        $id_akun = $this->session->get('id_akun');
        $newEmail = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $registerModel = new RegisterModel();
        $existingUser = $registerModel->where('email', $newEmail)->first();

        if ($existingUser) {
            $message = "Email sudah terdaftar!";
            $data['message'] = $message;
            return redirect()->to('UbahAkun')->with('message', $message);
        }

        $akunModel = new AkunModel();
        $user = $akunModel->find($id_akun);

        if (password_verify($password, $user['password'])) {
            $otp = rand(100000, 999999);
            $this->session->set('otp', $otp);
            $this->session->set('email', $newEmail);
            $this->session->set('newEmail', $newEmail);

            $emailService = service('email');
            $emailService->setTo($newEmail);
            $emailService->setFrom('iniemail.noreply@gmail.com', 'Polres Lampung Utara');
            $emailService->setSubject('Verifikasi Kode OTP');
            $emailService->setMessage("Kode OTP Anda: $otp");
            $emailService->send();

            return redirect()->to('UbahAkun/update_verification');
        } else {
            $message = "Password salah.";
            $data['message'] = $message;
            return redirect()->to('UbahAkun')->with('message', $message);
        }
    }

    public function update_verification()
    {
        return view('v_Update_Verification');
    }

    public function verify_otp()
    {
        $user_otp = $this->request->getPost('otp');
        $stored_otp = $this->session->get('otp');
        $id_akun = $this->session->get('id_akun');
        $email = $this->session->get('email');
        $newEmail = $this->session->get('newEmail');

        $akunModel = new AkunModel();

        if ($user_otp == $stored_otp) {
            $akunModel->update($id_akun, ['email' => $newEmail]);

            $this->session->remove(['logged_in', 'id_akun', 'email']);

            $message = "Email berhasil diubah. Silahkan log in kembali!";
            $data['message'] = $message;
            return redirect()->to('login')->with('message', $message);
        } else {
            $message = "Kode OTP tidak valid!";
            $data['message'] = $message;
            return view('v_Update_Verification', $data);
        }
    }

    public function update_password()
    {
        return view('v_Reset_Password');
    }
}
