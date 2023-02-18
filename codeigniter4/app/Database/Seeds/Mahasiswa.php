<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Mahasiswa extends Seeder
{
    public function run()
    {
        // import from csv
        $file = fopen("data/mahasiswa.csv", "r");
        $i = 0;
        while (($getData = fgetcsv($file, 10000, ",")) !== false) {
            if ($i > 0) {
                $data = [
                    'nim' => $getData[0],
                    'nama' => $getData[1],
                    'umur' => $getData[2],
                ];
                $this->db->table('mahasiswa')->insert($data);
            }
            $i++;
        }
        fclose($file);
    }
}
