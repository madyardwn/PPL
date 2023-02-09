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

        $model->create($data);
    }

    public function delete($nim)
    {
        $model = new \App\Models\M_Mahasiswa();
        $model->delete($nim);
        return redirect()->to(base_url('mahasiswa'));
    }

    public function update($nim)
    {
        $model = new \App\Models\M_Mahasiswa();
        $data = [
            'nim' => $nim,
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        $model->edit($data);
        return redirect()->to(base_url('mahasiswa'));
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
}
