<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pegawai extends Model
{
  protected $table = 'pegawai';
  protected $primaryKey = 'nim';

  public function get()
  {
    $sql = "SELECT * FROM {$this->table}";

    $db = db_connect();
    $data = $db->query($sql);

    return $data->getResultArray();
  }

  public function id($nim)
  {
    $sql = "SELECT * FROM {$this->table} WHERE nim = :nim:";

    $db = db_connect();
    $data = $db->query($sql, ['nim' => $nim]);

    return $data->getRowArray();
  }

  public function create($data)
  {
    $sql = "INSERT INTO {$this->table} (nim, nama, gender, telepon, email, pendidikan) VALUES (:nim:, :nama:, :gender:, :telepon:, :email:, :pendidikan:)";

    $db = db_connect();
    $db->query($sql, $data);
  }
}
