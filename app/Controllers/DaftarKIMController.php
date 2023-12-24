<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;;

class DaftarKIMController extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;
    protected $kimModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->penggunaModel = new DaftarPenggunaModel();
    }

    public function index()
    {
        $data['title'] = 'KIM';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['numbers'] = range(1, 90);
        return view('kim', $data);
    }
}
