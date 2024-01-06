<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;

class DaftarBukuIndukController extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->penggunaModel = new DaftarPenggunaModel();
    }

    public function index()
    {
        $data['title'] = 'Buku Induk Siswa';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        return view('bukuinduk', $data);
    }
}
