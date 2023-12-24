<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarManagementModel;

class DaftarKIMController extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;
    protected $managementModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->penggunaModel = new DaftarPenggunaModel();
        $this->managementModel = new DaftarManagementModel();
    }

    public function index()
    {
        $data['title'] = 'KIM';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['numbers'] = range(1, 90);
        $data['management'] = $this->managementModel->where(['nik' => user()->nik])->first();
        return view('kim', $data);
    }
}
