<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarPendikModel;

class DaftarPendikController extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;
    protected $pendikModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->penggunaModel = new DaftarPenggunaModel();
        $this->pendikModel = new DaftarPendikModel();
    }

    public function index()
    {
        $data['title'] = 'Daftar Pendik';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['pendik'] = $this->pendikModel->findAll();
        return view('daftar_pendik', $data);
    }

    public function create_pendik()
    {
        $data['title'] = 'Tambah Pendik';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['pendik'] = $this->pendikModel->findAll();
        return view('create_pendik', $data);
    }
}
