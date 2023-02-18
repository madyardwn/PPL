<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
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
                'umur' => [
                    'type' => 'INT',
                    'constraint' => '2',
                ],
            ]
        );
        $this->forge->addKey('nim', true);
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
