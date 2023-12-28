<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['email', 'password'];

    public function updateEmail($email, $newEmail)
    {
        $this->where('email', $email)
            ->set(['email' => $newEmail])
            ->update();
    }

}
