<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarKaryawanEditModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarPenggunaEditModel;
use App\Models\DaftarManagementModel;
use Myth\Auth\Password;

class Home extends BaseController
{
    protected $karyawanModel;
    protected $karyawanEditModel;
    protected $penggunaModel;
    protected $penggunaEditModel;
    protected $managementModel;

    public function __construct()
    {
        $this->karyawanModel = new DaftarKaryawanModel();
        $this->karyawanEditModel = new DaftarKaryawanEditModel();
        $this->penggunaModel = new DaftarPenggunaModel();
        $this->penggunaEditModel = new DaftarPenggunaEditModel();
        $this->managementModel = new DaftarManagementModel();
    }
    public function index(): string
    {
        return view('welcome_message');
    }

    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['users'] = $this->penggunaModel->getPengguna();
        $data['management'] = $this->managementModel->where(['nik' => user()->nik])->first();
        $data['management1'] = $this->managementModel->findAll();
        return view('dashboard', $data);
    }

    public function my_profile($nik)
    {
        $data['title'] = 'Profile Karyawan';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['user'] = $this->penggunaModel->where(['nik' => $nik])->first();

        return view('profile_user', $data);
    }

    public function update_profile($nik)
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'permit_empty|valid_emails|max_length[50]',
                'errors' => [
                    'valid_emails' => 'There is no @ element',
                    'max_length' => 'Email maximum 50 characters',
                ],
            ],
            'password_hash' => [
                'rules' => 'permit_empty|max_length[50]',
                'errors' => [
                    'max_length' => 'Password maximum 50 characters',
                ],
            ],
            'foto' => [
                'rules' => 'max_size[foto, 1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Photo profile cannot be larger than 1 MB',
                    'is_image' => 'File must be image',
                    'mime_in' => 'File must be image',
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() != 4) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img', $namaFoto);
            unlink('img/' . $this->request->getVar('fotoLama'));
        } else {
            $namaFoto = $this->request->getVar('fotoLama');
        }

        $email          = $this->request->getVar('email');
        if ($email == null) {
            $namaEmail = $this->request->getVar('emailLama');
        } else {
            $namaEmail = $this->request->getVar('email');
        }

        $password           = $this->request->getVar('password_hash');
        if ($password == null) {
            $namaPassword = $this->request->getVar('passwordLama');
        } else {
            $namaPassword = $this->request->getVar('password_hash');
        }

        $password_hash      = $this->request->getVar('password_hash');
        if ($password_hash == null) {
            $namaPasswordHash = $this->request->getVar('password_hashLama');
        } else {
            $namaPasswordHash = Password::hash($this->request->getVar('password_hash'));
        }

        $dataKaryawan  = [
            'foto' => $namaFoto,
        ];

        $dataPengguna  = [
            'email' => $namaEmail,
            'password' => $namaPassword,
            'password_hash' => $namaPasswordHash,
        ];

        // dd($dataKaryawan, $dataPengguna);

        if ($this->karyawanEditModel->update($nik, $dataKaryawan) == true && $this->penggunaEditModel->update($nik, $dataPengguna) == true) {
            return redirect()->to(base_url('dashboard'))->with('success', 'Data Profile Berhasil Diubah');
        } else {
            return redirect()->back()->with('error', 'Data Profile Gagal Diubah');
        }
    }
}
