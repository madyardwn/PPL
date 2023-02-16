<?php

namespace App\Controllers;

class C_Pegawai extends BaseController
{
  public function index()
  {
    $model = new \App\Models\M_Pegawai();
    $data = [
      'title' => 'Data Pegawai',
      'pegawai' => $model->get()
    ];
    return view('pegawai/v_index', $data);
  }

  public function create()
  {
    $data = [
      'title' => 'Tambah Data Pegawai'
    ];
    return view('pegawai/v_create', $data);
  }

  public function store()
  {
    $model = new \App\Models\M_Pegawai();
    $data = [
      'nim' => $this->request->getPost('nim'),
      'nama' => $this->request->getPost('nama'),
      'gender' => $this->request->getPost('gender'),
      'telepon' => $this->request->getPost('telepon'),
      'email' => $this->request->getPost('email'),
      'pendidikan' => $this->request->getPost('pendidikan'),
    ];

    if ($model->id($data['nim'])) {
      session()->setFlashdata('error', 'NIM sudah ada');
      return redirect()->to(base_url('pegawai/create'));
    } else if (
      $data['nim'] == ''
      || $data['nama'] == ''
      || $data['gender'] == ''
      || $data['email'] == ''
      || $data['telepon'] == ''
      || $data['email'] == ''
      || $data['pendidikan'] == ''
    ) {
      session()->setFlashdata('error', 'Data tidak boleh ada yang kosong');
      return redirect()->to(base_url('pegawai/create'));
    } else if (!is_numeric($data['nim'])) {
      session()->setFlashdata('error', 'NIM harus berupa angka');
      return redirect()->to(base_url('pegawai/create'));
    } else if ($data['nim'] <= 0) {
      session()->setFlashdata('error', 'NIM tidak boleh 0 atau negatif');
      return redirect()->to(base_url('pegawai/create'));
    } else if (strlen($data['nim']) != 9) {
      session()->setFlashdata('error', 'NIM harus 9 digit');
      return redirect()->to(base_url('pegawai/create'));
    } else if (is_numeric($data['nama'])) {
      session()->setFlashdata('error', 'Nama tidak boleh berupa angka');
      return redirect()->to(base_url('pegawai/create'));
    } else if (!is_numeric($data['telepon'])) {
      session()->setFlashdata('error', 'Telepon harus berupa angka');
      return redirect()->to(base_url('pegawai/create'));
    } else {
      try {
        $model->create($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('pegawai'));
      } catch (\Exception $e) {
        session()->setFlashdata('error', 'Data gagal ditambahkan' . $e->getMessage());
        return redirect()->to(base_url('pegawai/create'));
      }
    }
  }
}
