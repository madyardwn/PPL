<?php

namespace App\Controllers;

class C_Mahasiswa extends BaseController
{
    public function index()
    {
        $model = new \App\Models\M_Mahasiswa();
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $model->get()
        ];
        return view('mahasiswa/v_index', $data);
    }

    public function show($nim)
    {
        $model = new \App\Models\M_Mahasiswa();
        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $model->id($nim)
        ];
        return view('mahasiswa/v_show', $data);
    }

    public function store()
    {
        $model = new \App\Models\M_Mahasiswa();
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        if ($model->id($data['nim'])) {
            session()->setFlashdata('error', 'NIM sudah ada');
            return redirect()->to(base_url('mahasiswa/create'));
        } else if ($data['nim'] == '' || $data['nama'] == '' || $data['umur'] == '') {
            session()->setFlashdata('error', 'Data tidak boleh ada yang kosong');
            return redirect()->to(base_url('mahasiswa/create'));
        } else if (!is_numeric($data['umur'])) {
            session()->setFlashdata('error', 'Umur harus berupa angka');
            return redirect()->to(base_url('mahasiswa/create'));
        } else if (!is_numeric($data['nim'])) {
            session()->setFlashdata('error', 'NIM harus berupa angka');
            return redirect()->to(base_url('mahasiswa/create'));
        } else if ($data['nim'] <= 0) {
            session()->setFlashdata('error', 'NIM tidak boleh 0 atau negatif');
            return redirect()->to(base_url('mahasiswa/create'));
        } else if ($data['umur'] <= 0) {
            session()->setFlashdata('error', 'Umur tidak boleh 0 atau negatif');
            return redirect()->to(base_url('mahasiswa/create'));
        } else {
            try {
                $model->create($data);
                session()->setFlashdata('success', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('mahasiswa'));
            } catch (\Exception $e) {
                session()->setFlashdata('error', 'Data gagal ditambahkan' . $e->getMessage());
                return redirect()->to(base_url('mahasiswa/create'));
            }
        }
    }

    public function delete($nim)
    {
        $model = new \App\Models\M_Mahasiswa();
        $model->delete($nim);

        if ($model->id($nim)) {
            session()->setFlashdata('error', 'Data gagal dihapus');
            return redirect()->to(base_url('mahasiswa'));
        } else {
            session()->setFlashdata('success', 'Data berhasil dihapus');
            return redirect()->to(base_url('mahasiswa'));
        }
    }

    public function update($nim)
    {
        $model = new \App\Models\M_Mahasiswa();
        $data = [
            'nim' => $nim,
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        if ($data['nama'] == '' || $data['umur'] == '') {
            session()->setFlashdata('error', 'Data tidak boleh ada yang kosong');
            return redirect()->to(base_url('mahasiswa/edit/' . $nim));
        } else if (!is_numeric($data['umur'])) {
            session()->setFlashdata('error', 'Umur harus berupa angka');
            return redirect()->to(base_url('mahasiswa/edit/' . $nim));
        } else if ($data['umur'] <= 0) {
            session()->setFlashdata('error', 'Umur tidak boleh 0 atau negatif');
            return redirect()->to(base_url('mahasiswa/edit/' . $nim));
        } else {
            try {
                $model->edit($data);
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect()->to(base_url('mahasiswa'));
            } catch (\Exception $e) {
                session()->setFlashdata('error', 'Data gagal diubah' . $e->getMessage());
                return redirect()->to(base_url('mahasiswa/edit/' . $nim));
            }
        }
    }


    public function search()
    {
        $model = new \App\Models\M_Mahasiswa();
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $model->query($this->request->getPost('keyword'))
        ];
        return view('mahasiswa/v_index', $data);
    }

    public function edit($nim)
    {
        $model = new \App\Models\M_Mahasiswa();
        $data = [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $model->id($nim)
        ];
        return view('mahasiswa/v_edit', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Mahasiswa'
        ];
        return view('mahasiswa/v_create', $data);
    }
}
