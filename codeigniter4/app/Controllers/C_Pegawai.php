<?php

namespace App\Controllers;

class C_Pegawai extends BaseController
{
    public function index()
    {
        $model = new \App\Models\M_Pegawai();
        if ($this->request->getVar('keyword')) {
            $keyword = $this->request->getVar('keyword');
            $data = [
                'title' => 'Daftar Pegawai',
                'pegawai' => $model->search($keyword)->paginate(5, 'pegawai'),
                'pager' => $model->pager,
                'keyword' => $keyword
            ];
        } else {
            $data = [
                'title' => 'Daftar Pegawai',
                'pegawai' => $model->paginate(5, 'pegawai'),
                'pager' => $model->pager,
                'currentPage' => $model->getCurrentPage(),
                'keyword' => ''
            ];
        }
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

        $rules = [
            'nim' => 'required|numeric|is_unique[pegawai.nim]|min_length[9]|greater_than[0]',
            'nama' => 'required|alpha_space',
            'gender' => 'required|in_list[Laki-laki,Perempuan]',
            'telepon' => 'required|numeric|min_length[10]|regex_match[^(\\+62|0)[1-9][0-9]{10,15}$]',
            'email' => 'required|valid_email|is_unique[pegawai.email]',
            'pendidikan' => 'required|in_list[SD,SMP,SMA]'
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
            'gender' => [
                'required' => 'Jenis kelamin harus diisi',
                'in_list' => 'Jenis kelamin tidak valid',
            ],
            'telepon' => [
                'required' => 'Telepon harus diisi',
                'numeric' => 'Telepon harus berupa angka',
                'min_length' => 'Telepon minimal 10 digit',
                'regex_match' => 'Telepon tidak valid',
            ],
            'email' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah digunakan',
            ],
            'pendidikan' => [
                'required' => 'Pendidikan harus diisi',
                'in_list' => 'Pendidikan tidak valid'
            ],
        ];

        if (!$this->validate($rules, $errors)) {
            $data = [
                'title' => 'Tambah Data Pegawai',
                'validation' => $this->validator
            ];
            return view('pegawai/v_create', $data);
        } else {
            $model->create($data);
            return redirect()->to('/pegawai');
        }
    }

    public function show($nim)
    {
        $model = new \App\Models\M_Pegawai();
        $data = [
            'title' => 'Detail Pegawai',
            'pegawai' => $model->id($nim)
        ];
        return view('pegawai/v_show', $data);
    }

    public function delete($nim)
    {
        $model = new \App\Models\M_Pegawai();
        $model->delete($nim);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/pegawai');
    }


    public function update($nim)
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

        $rules = [
            'nim' => 'required|numeric|min_length[9]|greater_than[0]|is_unique[pegawai.nim,nim,' . $nim . ']',
            'nama' => 'required|alpha_space',
            'gender' => 'required|in_list[Laki-laki,Perempuan]',
            'telepon' => 'required|numeric|min_length[10]|regex_match[^(\\+62|0)[1-9][0-9]{10,15}$]',
            'email' => 'required|valid_email|is_unique[pegawai.email,email,' . $model->id($nim)['email'] . ']',
            'pendidikan' => 'required|in_list[SD,SMP,SMA]'
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
            'gender' => [
                'required' => 'Jenis kelamin harus diisi',
                'in_list' => 'Jenis kelamin tidak valid',
            ],
            'telepon' => [
                'required' => 'Telepon harus diisi',
                'numeric' => 'Telepon harus berupa angka',
                'min_length' => 'Telepon minimal 10 digit',
                'regex_match' => 'Telepon tidak valid',
            ],
            'email' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah digunakan',
            ],
            'pendidikan' => [
                'required' => 'Pendidikan harus diisi',
                'in_list' => 'Pendidikan tidak valid'
            ],
        ];

        if (!$this->validate($rules, $errors)) {
            $data = [
                'title' => 'Edit Pegawai',
                'validation' => $this->validator,
                'pegawai' => $model->id($nim)
            ];
            return view('pegawai/v_edit', $data);
        } else {
            $model->edit($data, $nim);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('/pegawai');
        }
    }

    public function edit($nim)
    {
        $model = new \App\Models\M_Pegawai();
        $data = [
            'title' => 'Edit Pegawawi',
            'pegawai' => $model->id($nim)
        ];
        return view('pegawai/v_edit', $data);
    }
}
