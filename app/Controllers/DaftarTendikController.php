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

    public function create_tendik()
    {
        $data['title'] = 'Tambah Tendik';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['tendik'] = $this->tendikModel->findAll();
        return view('create_tendik', $data);
    }

    public function save_tendik()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[tendik.nik]|numeric|max_length[16]|min_length[16]',
                'errors' => [
                    'required' => 'NIK Tidak Boleh Kosong',
                    'is_unique' => 'NIK Sudah Ada Di Dalam Database',
                    'max_length' => 'Maximal NIK 16 Karakter',
                    'min_length' => 'Minimal NIK 16 Karakter',
                    'numeric' => 'NIK Hanya Bisa Diinputkan Dengan Angka',
                ],
            ],
            'nama_tendik' => [
                'rules' => 'required|alpha_space|max_length[100]',
                'errors' => [
                    'required' => 'Nama Tendik Tidak Boleh Kosong',
                    'alpha_space' => 'Nama Tendik Hanya Bisa Diinputkan Dengan Huruf dan Spasi',
                    'max_length' => 'Maximal Nama Tendik 100 Karakter',
                ],
            ],
            'tempat_lahir' => [
                'rules' => 'required|alpha_space|max_length[50]',
                'errors' => [
                    'required' => 'Tempat Lahir Tidak Boleh Kosong',
                    'alpha_space' => 'Tempat Lahir Hanya Bisa Diinputkan Dengan Huruf dan Spasi',
                    'max_length' => 'Maximal Tempat Lahir 50 Karakter',
                ],
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Tidak Boleh Kosong',
                ],
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Agama Tidak Boleh Kosong',
                ],
            ],
            'jekel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin Tidak Boleh Kosong',
                ],
            ],
            'alamat' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Alamat Tidak Boleh Kosong',
                    'max_length' => 'Maximal Alamat 100 Karakter',
                ],
            ],
            'telp' => [
                'rules' => 'required|numeric|max_length[15]|min_length[8]',
                'errors' => [
                    'required' => 'Nomor Telepon Tidak Boleh Kosong',
                    'numeric' => 'Nomor Telepon Hanya Bisa Diinputkan Dengan Angka',
                    'max_length' => 'Maximal Nomor Telepon 15 Karakter',
                    'min_length' => 'Minimal Nomor Telepon 8 Karakter',
                ],
            ],
            'status_gtk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status GTK Tidak Boleh Kosong',
                ],
            ],
            'nip' => [
                'rules' => 'numeric|max_length[16]|min_length[16]|permit_empty',
                'errors' => [
                    'numeric' => 'NIP Hanya Bisa Diinputkan Dengan Angka',
                    'max_length' => 'Maximal NIP 16 Karakter',
                    'min_length' => 'Minimal NIP 16 Karakter',
                ],
            ],
            'nuptk' => [
                'rules' => 'numeric|max_length[16]|min_length[16]',
                'errors' => [
                    'numeric' => 'NUPTK Hanya Bisa Diinputkan Dengan Angka',
                    'max_length' => 'Maximal NUPTK 16 Karakter',
                    'min_length' => 'Minimal NUPTK 16 Karakter',
                ],
            ],
            'tmt_tugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'TMT Tugas Tidak Boleh Kosong',
                ],
            ],
            'tmt_pns' => [
                'rules' => 'permit_empty',
                'errors' => [],
            ],
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $npsnSekolah = $this->request->getVar('npsnSekolah');
        $nik = $this->request->getVar('nik');
        $nama_tendik = $this->request->getVar('nama_tendik');
        $tempat_lahir = $this->request->getVar('tempat_lahir');
        $tanggal_lahir = $this->request->getVar('tanggal_lahir');
        $agama = $this->request->getVar('agama');
        $jekel = $this->request->getVar('jekel');
        $alamat = $this->request->getVar('alamat');
        $telp = $this->request->getVar('telp');
        $status_gtk = $this->request->getVar('status_gtk');
        $nip = $this->request->getVar('nip');
        $nuptk = $this->request->getVar('nuptk');
        $tmt_tugas = $this->request->getVar('tmt_tugas');
        $tmt_pns = ($status_gtk == 'BOSDA' || $status_gtk == 'BOS') ? null : $this->request->getVar('tmt_pns');

        $data = [
            'npsn' => $npsnSekolah,
            'nik' => $nik,
            'nama_tendik' => $nama_tendik,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'agama' => $agama,
            'jekel' => $jekel,
            'alamat' => $alamat,
            'telp' => $telp,
            'status_gtk' => $status_gtk,
            'nip' => $nip,
            'nuptk' => $nuptk,
            'tmt_tugas' => $tmt_tugas,
            'tmt_pns' => $tmt_pns
        ];

        if ($this->tendikModel->save($data) == true) {
            return redirect()->to(base_url('daftar_tendik'))->with('success', 'Data Tendik Berhasil Disimpan');
        } else {
            return redirect()->back()->with('error', 'Data Tendik Gagal Disimpan');
        }
    }
}
