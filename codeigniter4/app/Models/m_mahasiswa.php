<?php

namespace App\Models;

use CodeIgniter\Model;

class m_mahasiswa extends Model
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

    public function add($data)
    {
        $sql = "INSERT INTO {$this->table} (nim, nama, umur) VALUES (:nim:, :nama:, :umur:)";

        $db = db_connect();
        $db->query($sql, $data);
    }

    public function show($nim)
    {
        $sql = "SELECT * FROM {$this->table} WHERE nim = :nim:";

        $db = db_connect();
        $data = $db->query($sql, ['nim' => $nim]);

        return $data->getRowArray();
    }

    public function store($data)
    {
        $sql = "UPDATE {$this->table} SET nama = :nama:, umur = :umur: WHERE nim = :nim:";

        $db = db_connect();
        $db->query($sql, $data);
    }

    public function search($keyword)
    {
        $builder = $this->db->table($this->table)
            ->like('nim', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('umur', $keyword);

        // eksekusi query dan kembalikan hasilnya
        return $builder->get()->getResultArray();
    }
}
