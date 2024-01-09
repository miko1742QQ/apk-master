<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarSiswaModel;

class DaftarSiswaController extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->penggunaModel = new DaftarPenggunaModel();
        $this->siswaModel = new DaftarSiswaModel();
    }

    public function index()
    {
        $data['title'] = 'Daftar Siswa';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['siswa'] = $this->siswaModel->findAll();
        return view('daftar_siswa', $data);
    }

    public function create_siswa()
    {
        $data['title'] = 'Tambah Siswa';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['siswa'] = $this->siswaModel->findAll();
        $data['tempattinggal'] = $this->siswaModel->getTempatTinggal();
        $data['transportasi'] = $this->siswaModel->getTransportasi();
        $data['pendidikan'] = $this->siswaModel->getPendidikan();
        $data['pekerjaan'] = $this->siswaModel->getPekerjaan();
        $data['penghasilan'] = $this->siswaModel->getPenghasilan();
        return view('create_siswa', $data);
    }
}
