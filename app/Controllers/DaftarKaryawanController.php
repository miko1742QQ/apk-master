<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use Myth\Auth\Password;

class DaftarKaryawanController extends BaseController
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
        $data['title'] = 'Daftar Karyawan';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        return view('daftar_karyawan', $data);
    }

    public function create_karyawan()
    {
        $data['title'] = 'Tambah Data Karyawan';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        return view('create_karyawan', $data);
    }

    public function save_karyawan()
    {
        // validation input
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[karyawan.nik]|numeric|max_length[16]|min_length[16]',
                'errors' => [
                    'required' => 'NIK Tidak Boleh Kosong',
                    'is_unique' => 'NIK Sudah Ada Di Dalam Database',
                    'max_length' => 'Maximal NIK 16 Karakter',
                    'min_length' => 'Minimal NIK 16 Karakter',
                    'numeric' => 'NIK Hanya Bisa Diinputkan Dengan Angka',
                ],
            ],
            'npsn' => [
                'rules' => 'required|is_unique[karyawan.npsn]|numeric|max_length[8]|min_length[8]',
                'errors' => [
                    'required' => 'NPSN Tidak Boleh Kosong',
                    'is_unique' => 'NPSN Sudah Ada Di Dalam Database',
                    'max_length' => 'Maximal NPSN 8 Karakter',
                    'min_length' => 'Minimal NPSN 8 Karakter',
                    'numeric' => 'NPSN Hanya Bisa Diinputkan Dengan Angka',
                ],
            ],
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong',
                    'max_length' => 'Nama Maksimal 100 Karakter',
                ],
            ],
            'foto' => [
                'rules' => 'required|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'required' => 'Foto Tidak Boleh Kosong',
                    'max_size' => 'Ukuran Foto Profil tidak boleh lebih dari 1 MB',
                    'is_image' => 'Berkas harus berupa gambar',
                    'mime_in' => 'Berkas harus berupa gambar',
                ],
            ],
        ])) {
            // return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $nik        = $this->request->getVar('nik');
        $npsn       = $this->request->getVar('npsn');
        $nama       = $this->request->getVar('nama');

        // ambil foto
        $fileFoto = $this->request->getFile('foto');
        // ambil nama file foto
        $namaFoto = $fileFoto->getRandomName();
        // pindahkan file ke folder img
        $fileFoto->move('img', $namaFoto);

        $data = [
            'nik' => $nik,
            'npsn' => $npsn,
            'nama_karyawan' => $nama,
            'foto' => $namaFoto,
        ];

        // dd($data);

        if ($this->karyawanModel->save($data) == true) {
            return redirect()->to(base_url('daftar_karyawan'))->with('success', 'Data Karyawan Berhasil Disimpan');
        } else {
            return redirect()->back()->with('error', 'Data Karyawan Gagal Disimpan');
        }
    }

    public function edit_karyawan($id = null)
    {
        $data['title'] = 'Edit Karyawan';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['datakaryawan'] = $this->karyawanModel->where(['id_karyawan' => $id])->first();
        return view('edit_karyawan', $data);
    }

    public function update_karyawan($id_karyawan = null)
    {
        // validation input
        if (!$this->validate([
            'nik' => [
                'rules' => 'is_unique[karyawan.nik]|numeric|max_length[16]|min_length[16]|permit_empty',
                'errors' => [
                    'is_unique' => 'NIK Sudah Ada Di Dalam Database',
                    'max_length' => 'Maximal NIK 16 Karakter',
                    'min_length' => 'Minimal NIK 16 Karakter',
                    'numeric' => 'NIK Hanya Bisa Diinputkan Dengan Angka',
                ],
            ],
            'npsn' => [
                'rules' => 'is_unique[karyawan.npsn]|numeric|max_length[8]|min_length[8]|permit_empty',
                'errors' => [
                    'is_unique' => 'NPSN Sudah Ada Di Dalam Database',
                    'max_length' => 'Maximal NPSN 8 Karakter',
                    'min_length' => 'Minimal NPSN 8 Karakter',
                    'numeric' => 'NPSN Hanya Bisa Diinputkan Dengan Angka',
                ],
            ],
            'nama' => [
                'rules' => 'alpha_numeric_space|max_length[100]|permit_empty',
                'errors' => [
                    'max_length' => 'Nama Maksimal 100 Karakter',
                    'alpha_numeric_space' => 'Nama Hanya Bisa Diinputkan Dengan Huruf'
                ],
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|permit_empty',
                'errors' => [
                    'max_size' => 'Ukuran Foto Profil tidak boleh lebih dari 1 MB',
                    'is_image' => 'Berkas harus berupa gambar',
                    'mime_in' => 'Berkas harus berupa gambar',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $nik    = $this->request->getVar('nik');
        if ($nik == null) {
            $dataNik = $this->request->getVar('nikLama');
        } else {
            $dataNik = $this->request->getVar('nik');
        }

        $npsn    = $this->request->getVar('npsn');
        if ($npsn == null) {
            $dataNpsn = $this->request->getVar('npsnLama');
        } else {
            $dataNpsn = $this->request->getVar('npsn');
        }

        $nama       = $this->request->getVar('nama');
        if ($nama == null) {
            $dataNama = $this->request->getVar('namaLama');
        } else {
            $dataNama = $this->request->getVar('nama');
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img', $namaFoto);
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        $data = [
            'nik' => $dataNik,
            'npsn' => $dataNpsn,
            'nama_karyawan' => $dataNama,
            'foto' => $namaFoto,
        ];

        // dd($data);
        if ($this->karyawanModel->update($id_karyawan, $data) == true) {
            return redirect()->to(base_url('daftar_karyawan'))->with('success', 'Data Karyawan Berhasil Diperbaharui');
        } else {
            return redirect()->back()->with('error', 'Data Karyawan Gagal Diperbaharui');
        }
    }

    public function delete_karyawan($id_karyawan = null)
    {
        if ($this->karyawanModel->delete($id_karyawan) == true) {
            return redirect()->to(base_url('daftar_karyawan'))->with('success', 'Data Karyawan Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Data Karyawan Gagal Dihapus');
        }
    }
}
