<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Auth extends Model
{
    protected $table = 'admin';

    public function validateUser($username, $password)
    {
        $password = md5($password);
        return $this->db->table($this->table)
            ->where(['username' => $username, 'password' => $password])
            ->get()
            ->getRow();
    }
}
