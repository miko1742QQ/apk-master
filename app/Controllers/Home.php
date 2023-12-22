<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;


class Home extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->penggunaModel = new DaftarPenggunaModel();
    }
    public function index(): string
    {
        $data['title'] = 'Login';
        return view('welcome_message');
    }

    public function dashboard()
    {
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['users'] = $this->penggunaModel->getPengguna();
        // dd($data);
        $data['title'] = 'Dashboard';
        return view('dashboard', $data);
        // return view('dashboard');
    }
}
