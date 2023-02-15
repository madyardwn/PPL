<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';

    public function get()
    {
        $sql = "SELECT * FROM {$this->table}";

        $db = db_connect();
        $data = $db->query($sql);

        return $data->getResultArray();
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (nim, nama, umur) VALUES (:nim:, :nama:, :umur:)";

        $db = db_connect();
        $db->query($sql, $data);
    }

    public function id($nim)
    {
        $sql = "SELECT * FROM {$this->table} WHERE nim = :nim:";

        $db = db_connect();
        $data = $db->query($sql, ['nim' => $nim]);

        return $data->getRowArray();
    }

    public function edit($data)
    {
        $sql = "UPDATE {$this->table} SET nama = :nama:, umur = :umur: WHERE nim = :nim:";

        $db = db_connect();
        $db->query($sql, $data);
    }

    public function query($keyword)
    {
        // $builder = $this->db->table($this->table)
        //     ->like('nim', $keyword)
        //     ->orLike('nama', $keyword)
        //     ->orLike('umur', $keyword);
        //
        // // eksekusi query dan kembalikan hasilnya
        // return $builder->get()->getResultArray();

        $sql = "SELECT * FROM {$this->table} WHERE nim LIKE '%{$keyword}%' OR nama LIKE '%{$keyword}%' OR umur LIKE '%{$keyword}%'";
        $db = db_connect();
        $data = $db->query($sql);
        return $data->getResultArray();
    }
}
