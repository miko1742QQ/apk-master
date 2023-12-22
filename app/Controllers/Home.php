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
        return view('welcome_message');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['users'] = $this->penggunaModel->getPengguna();
        return view('dashboard', $data);
    }

    public function my_profile($nik)
    {
        $data['title'] = 'Profile Karyawan';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['user'] = $this->penggunaModel->where(['nik' => $nik])->first();

        return view('profile_user', $data);
    }
}
