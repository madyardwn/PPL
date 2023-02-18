<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Pegawai extends Model
{
  protected $table = 'pegawai';
  protected $primaryKey = 'nim';

  protected $allowedFields = ['nama', 'gender', 'telepon', 'email', 'pendidikan'];

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


  public function edit($data, $nim)
  {
    $sql = "UPDATE {$this->table} SET nim=:nim:, email=:email:, nama=:nama:, gender=:gender:, telepon=:telepon:, pendidikan=:pendidikan: WHERE nim=" . $nim;
    $db = db_connect();
    $db->query($sql, $data);
  }


  public function query($keyword)
  {
    $sql = "SELECT * FROM {$this->table} WHERE nim LIKE '%{$keyword}%' OR nama LIKE '%{$keyword}%' OR email LIKE '%{$keyword}%' OR telepon LIKE '%{$keyword}%' OR pendidikan LIKE '%{$keyword}%' OR gender LIKE '%{$keyword}%'";
    $db = db_connect();
    $data = $db->query($sql);
    return $data->getResultArray();
  }
}
