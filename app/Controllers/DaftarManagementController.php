<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarManagementModel;

class DaftarManagementController extends BaseController
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
        $data['title'] = 'Daftar Management';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['management'] = $this->managementModel->where(['nik' => user()->nik])->first();
        // dd($data['management'], user()->nik);
        return view('management', $data);
    }

    public function save_management($id)
    {
        // validation input
        if (!$this->validate([
            'nama_management' => [
                'rules' => 'alpha_numeric_space|max_length[100]|permit_empty',
                'errors' => [
                    'max_length' => 'Nama Management Maksimal 100 Karakter',
                    'alpha_numeric_space' => 'Nama Management Hanya Bisa Diinputkan Dengan Huruf'
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
            'pesan' => [
                'rules' => 'max_length[255]|permit_empty',
                'errors' => [
                    'max_length' => 'Nama Management Maksimal 255 Karakter',
                ],
            ],

            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|permit_empty',
                'errors' => [
                    'max_size' => 'Ukuran Foto Benner tidak boleh lebih dari 1 MB',
                    'is_image' => 'Berkas harus berupa gambar',
                    'mime_in' => 'Berkas harus berupa gambar',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $nama       = $this->request->getVar('nama_management');
        if ($nama == null) {
            $dataNama = $this->request->getVar('namaLama');
        } else {
            $dataNama = $this->request->getVar('nama_management');
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
        $pesan    = $this->request->getVar('pesan');
        if ($pesan == null) {
            $dataPesan = $this->request->getVar('pesanLama');
        } else {
            $dataPesan = $this->request->getVar('pesan');
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() != 4) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('benner', $namaFoto);
            unlink('benner/' . $this->request->getVar('fotoLama'));
        } else {
            $namaFoto = $this->request->getVar('fotoLama');
        }

        $data = [
            'nama_management' => $dataNama,
            'alamat' => $dataAlamat,
            'telp' => $dataTelp,
            'pesan' => $dataPesan,
            'foto' => $namaFoto,
        ];

        // dd($data);
        if ($this->managementModel->update($id, $data) == true) {
            return redirect()->to(base_url('management'))->with('success', 'Data Management Berhasil Diperbaharui');
        } else {
            return redirect()->back()->with('error', 'Data Management Gagal Diperbaharui');
        }
    }
}
