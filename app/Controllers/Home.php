<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelLogin = new ModelLogin();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Login'
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        //validasi input
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Kosong'
                ]
            ]
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->ModelLogin->LoginUser($username, $password);
            if ($cek_login) {
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_kandidat', $cek_login['namakandidat']);
                session()->set('jabatan', $cek_login['jabatan']);
                return redirect()->to(base_url('Admin'));
            } else {
                session()->setFlashdata('gagal', 'Username Atau Password Salah!');
                return redirect()->to(base_url('Home'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Home')->withInput('validation', \Config\Services::validation()->getErrors());
        }
    }

    public function Logout()
    {
        session()->remove('id_user');
        session()->remove('nama_kandidat');
        session()->remove('jabatan');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout');
        return redirect()->to(base_url('Home'));
    }
}
