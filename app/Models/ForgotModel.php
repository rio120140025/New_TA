<?php

namespace App\Models;

use CodeIgniter\Model;

class ForgotModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['email', 'password'];

    public function updatePassword($email, $password)
    {
        $this->where('email', $email)
            ->set(['password' => password_hash($password, PASSWORD_DEFAULT)])
            ->update();
    }
}
