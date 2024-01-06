<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarTendikModel;

class DaftarTendikController extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;
    protected $tendikModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->penggunaModel = new DaftarPenggunaModel();
        $this->tendikModel = new DaftarTendikModel();
    }

    public function index()
    {
        $data['title'] = 'Daftar Tendik';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['tendik'] = $this->tendikModel->findAll();
        return view('daftar_tendik', $data);
    }
}
