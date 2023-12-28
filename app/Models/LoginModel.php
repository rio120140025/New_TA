<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['email', 'password', 'id_role'];

    public function get_user($email)
    {
        return $this->asObject()->where('email', $email)->first();
    }
}
