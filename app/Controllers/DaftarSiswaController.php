<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarSiswaModel;
use App\Models\DaftarManagementModel;

class DaftarSiswaController extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;
    protected $siswaModel;
    protected $managementModel;

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
        // $data['sekolah'] = $this->managementModel->findAll();
        $npsn = $data['datauser']['npsn'];

        if ($npsn == '00000000') {
            $data['siswa'] = $this->siswaModel->getDataSiswaWithManagement();
        } else {
            $data['siswa'] = $this->siswaModel->getDataSiswaWithManagement($npsn);
        }

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
        $data['bank'] = $this->siswaModel->getBank();
        $data['kebutuhankhusus'] = $this->siswaModel->getKebutuhanKhusus();
        return view('create_siswa', $data);
    }
}
