<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarManagementModel;

class DaftarProfileSekolahController extends BaseController
{
    protected $karyawanModel;
    protected $penggunaModel;
    protected $profilesekolahModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->penggunaModel = new DaftarPenggunaModel();
        $this->profilesekolahModel = new DaftarManagementModel();
    }

    public function index()
    {
        $data['title'] = 'Profile Sekolah';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['profilesekolah'] = $this->profilesekolahModel->where(['nik' => user()->nik])->first();
        return view('profile_sekolah', $data);
    }

    public function update_profilesekolah($id)
    {
        // validation input
        if (!$this->validate([
            'nama_sekolah' => [
                'rules' => 'max_length[100]|permit_empty',
                'errors' => [
                    'max_length' => 'Nama Sekolah Maksimal 100 Karakter',
                ],
            ],
            'alamat' => [
                'rules' => 'max_length[100]|permit_empty',
                'errors' => [
                    'max_length' => 'Alamat Maksimal 100 Karakter',
                ],
            ],
            'notelp' => [
                'rules' => 'numeric|max_length[15]|min_length[8]|permit_empty',
                'errors' => [
                    'max_length' => 'No Hp Maksimal 15 Karakter',
                    'min_length' => 'No Hp Maksimal 8 Karakter',
                    'numeric' => 'No Hp Hanya Bisa Diinputkan Dengan Angka',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $nama       = $this->request->getVar('nama_sekolah');
        if ($nama == null) {
            $dataNama = $this->request->getVar('namaLama');
        } else {
            $dataNama = $this->request->getVar('nama_sekolah');
        }

        $alamat    = $this->request->getVar('alamat');
        if ($alamat == null) {
            $dataAlamat = $this->request->getVar('alamatLama');
        } else {
            $dataAlamat = $this->request->getVar('alamat');
        }

        $telp    = $this->request->getVar('notelp');
        if ($telp == null) {
            $dataTelp = $this->request->getVar('telpLama');
        } else {
            $dataTelp = $this->request->getVar('notelp');
        }

        $data = [
            'nama_sekolah' => $dataNama,
            'alamat' => $dataAlamat,
            'telp' => $dataTelp,
        ];

        // dd($data);
        if ($this->profilesekolahModel->update($id, $data) == true) {
            return redirect()->to(base_url('profile_sekolah'))->with('success', 'Profile Sekolah Berhasil Diperbaharui');
        } else {
            return redirect()->back()->with('error', 'Profile Sekolah Gagal Diperbaharui');
        }
    }
}
