<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => md5('password'),
            ],
        ];
        $this->db->table('admin')->insertBatch($data);
    }
}
