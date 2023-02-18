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

        $rules = [
            'nim' => 'required|numeric|is_unique[mahasiswa.nim]|min_length[9]|greater_than[0]',
            'nama' => 'required|alpha_space',
            'umur' => 'required|numeric|greater_than[0]'
        ];

        $errors = [
            'nim' => [
                'required' => 'NIM harus diisi',
                'numeric' => 'NIM harus berupa angka',
                'is_unique' => 'NIM sudah digunakan',
                'min_length' => 'NIM harus 9 digit',
                'greater_than' => 'NIM tidak boleh 0 atau negatif',
            ],
            'nama' => [
                'required' => 'Nama harus diisi',
                'alpha_space' => 'Nama tidak boleh mengandung angka atau simbol',
            ],
            'umur' => [
                'required' => 'Umur harus diisi',
                'numeric' => 'Umur harus berupa angka',
                'greater_than' => 'Umur tidak boleh 0 atau negatif',
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            $data = [
                'title' => 'Tambah Data Mahasiswa',
                'validation' => $this->validator
            ];
            return view('mahasiswa/v_create', $data);
        } else {
            $model->insert($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('mahasiswa'));
        }
    }

    public function delete($nim)
    {
        $model = new \App\Models\M_Mahasiswa();
        $model->delete($nim);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('mahasiswa'));
    }

    public function update($nim)
    {
        $model = new \App\Models\M_Mahasiswa();
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        ];

        $rules = [
            'nim' => 'required|numeric|min_length[9]|greater_than[0]|is_unique[mahasiswa.nim,nim,' . $nim . ']',
            'nama' => 'required|alpha_space',
            'umur' => 'required|numeric|greater_than[0]'
        ];

        $errors = [
            'nim' => [
                'required' => 'NIM harus diisi',
                'numeric' => 'NIM harus berupa angka',
                'is_unique' => 'NIM sudah digunakan',
                'min_length' => 'NIM harus 9 digit',
                'greater_than' => 'NIM tidak boleh 0 atau negatif',
            ],
            'nama' => [
                'required' => 'Nama harus diisi',
                'alpha_space' => 'Nama tidak boleh mengandung angka atau simbol',
            ],
            'umur' => [
                'required' => 'Umur harus diisi',
                'numeric' => 'Umur harus berupa angka',
                'greater_than' => 'Umur tidak boleh 0 atau negatif',
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            $data = [
                'title' => 'Edit Data Mahasiswa',
                'validation' => $this->validator,
                'mahasiswa' => $model->id($nim)
            ];
            return view('mahasiswa/v_edit', $data);
        } else {
            $model->edit($data, $nim);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to(base_url('mahasiswa'));
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
