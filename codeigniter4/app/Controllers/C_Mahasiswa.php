<?php

namespace App\Controllers;

class C_Mahasiswa extends BaseController
{
    public function display()
    {
        $model = new \App\Models\m_mahasiswa();
        $data = [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $model->get()
        ];
        return view('mahasiswa/v_display', $data);
    }

    public function detail($nim)
    {
        $model = new \App\Models\m_mahasiswa();
        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $model->show($nim)
        ];
        return view('mahasiswa/v_detail', $data);
    }

    public function add()
    {
        $model = new \App\Models\m_mahasiswa();
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        $model->add($data);
    }

    public function delete($nim)
    {
        $model = new \App\Models\m_mahasiswa();
        $model->delete($nim);
        return redirect()->to(base_url('mahasiswa'));
    }

    public function edit($nim)
    {
        $model = new \App\Models\m_mahasiswa();
        $data = [
            'title' => 'Edit Data Mahasiswa',
            'mahasiswa' => $model->show($nim)
        ];
        return view('mahasiswa/v_edit', $data);
    }

    public function update($nim)
    {
        $model = new \App\Models\m_mahasiswa();
        $data = [
            'nim' => $nim,
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        $model->store($data);
        return redirect()->to(base_url('mahasiswa'));
    }
}
