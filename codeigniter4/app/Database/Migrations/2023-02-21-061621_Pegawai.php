<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'nim'          => [
                    'type'           => 'INT',
                    'constraint'     => 10,
                    'unsigned'       => true,
                ],
                'nama'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'gender' => [
                    'type' => 'ENUM',
                    'constraint' => ['Laki-laki', 'Perempuan'],
                ],
                'telepon' => [
                    'type' => 'VARCHAR',
                    'constraint' => '15',
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                ],
                'pendidikan' => [
                    'type' => 'ENUM',
                    'constraint' => ['SD', 'SMP', 'SMA'],
                ],
            ]
        );
        $this->forge->addKey('nim', true);
        $this->forge->createTable('pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('pegawai');
    }
}
