<?php

namespace App\Controllers;

use App\Models\DaftarKaryawanModel;
use App\Models\DaftarPenggunaModel;
use App\Models\DaftarSiswaModel;
use App\Models\DaftarManagementModel;

use CodeIgniter\HTTP\Header;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
            $data['siswa'] = $this->siswaModel->findAll();
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
        $data['lembaga'] = $this->siswaModel->getLembaga();
        return view('create_siswa', $data);
    }

    public function edit_siswa($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->back()->with('error', 'ID Siswa Tidak Valid');
        }

        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa Tidak Ditemukan');
        }

        $data['title'] = 'Edit Siswa';
        $data['datauser'] = $this->karyawanModel->where(['nik' => user()->nik])->first();
        $data['karyawan'] = $this->karyawanModel->findAll();
        $data['datasiswa'] = $this->siswaModel->where(['id' => $id])->first();
        $data['tempattinggal'] = $this->siswaModel->getTempatTinggal();
        $data['transportasi'] = $this->siswaModel->getTransportasi();
        $data['pendidikan'] = $this->siswaModel->getPendidikan();
        $data['pekerjaan'] = $this->siswaModel->getPekerjaan();
        $data['penghasilan'] = $this->siswaModel->getPenghasilan();
        $data['bank'] = $this->siswaModel->getBank();
        $data['kebutuhankhusus'] = $this->siswaModel->getKebutuhanKhusus();
        $data['lembaga'] = $this->siswaModel->getLembaga();

        return view('edit_siswa', $data);
    }

    public function downloadExcel()
    {
        $filename = 'template_siswa.xlsx';
        $filepath = FCPATH . 'unduhan/' . $filename;
        $response = service('response');
        return $response->download($filepath, NULL)->setFileName($filename);
    }

    public function export_siswa()
    {
        $filename = "daftar_siswa_" . date('d_M_Y') . ".xlsx";
        $data = $this->siswaModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Lembaga');
        $sheet->setCellValue('C1', 'NIS');
        $sheet->setCellValue('D1', 'Nama Siswa');
        $sheet->setCellValue('E1', 'Email');
        $sheet->setCellValue('F1', 'Status');

        $column = 2;
        foreach ($data as $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value['lembaga']);
            $sheet->setCellValue('C' . $column, $value['nipd']);
            $sheet->setCellValue('D' . $column, $value['nama_siswa']);
            $sheet->setCellValue('E' . $column, $value['email']);
            $sheet->setCellValue('F' . $column, $value['status']);
            $column++;
        }

        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFFFFF');

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000']
                ],
            ],
        ];

        $sheet->getStyle('A1:F' . ($column - 1))->applyFromArray($styleArray);

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename);
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function import_siswa()
    {
        $file = $this->request->getFile('excelFile');

        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($file);
            $import = $spreadsheet->getActiveSheet()->toArray();
            foreach ($import as $key => $value) {
                if ($key == 0) {
                    continue;
                } else {
                    $existingData = $this->siswaModel->where('nipd', $value[2])->first();

                    if (!$existingData) {
                        $data = [
                            'npsn' => '00000000',
                            'lembaga' => $value[1],
                            'nipd' => $value[2],
                            'nama_siswa' => $value[3],
                            'email' => $value[4],
                            'foto' => $value[5],
                            'status' => $value[6],
                        ];

                        $this->siswaModel->insert($data);
                    } else {
                        return redirect()->back()->with('error', 'NIPD ' . $value[2] . ' sudah ada dalam database.');
                    }
                }
            }
            return redirect()->to(base_url('daftar_siswa'))->with('success', 'Data Siswa Berhasil Diimport');
        } else {
            return redirect()->back()->with('error', 'Format file tidak sesuai dengan yang ditentukan');
        }
    }

    public function save_siswa()
    {
        if (!$this->validate([
            'lembaga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Lembaga Tidak Boleh Kosong',
                ],
            ],
            'nipd' => [
                'rules' => 'required|numeric|max_length[8]|min_length[8]',
                'errors' => [
                    'required' => 'NIS Tidak Boleh Kosong',
                    'numeric' => 'NIS Hanya Bisa Diinputkan Dengan Angka',
                    'max_length' => 'Maximal NIP 8 Karakter',
                    'min_length' => 'Minimal NIP 8 Karakter',
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required|alpha_space|max_length[100]',
                'errors' => [
                    'required' => 'Nama Siswa Tidak Boleh Kosong',
                    'alpha_space' => 'Nama Siswa Hanya Bisa Diinputkan Dengan Huruf dan Spasi',
                    'max_length' => 'Maximal Nama Siswa 100 Karakter',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_emails|max_length[50]',
                'errors' => [
                    'required' => 'Email Tidak Boleh Kosong',
                    'valid_emails' => 'Masukkan email yang valid',
                    'max_length' => 'Email maximum 50 characters',
                ],
            ],
            'foto' => [
                'rules' => 'required|max_size[foto,102]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'required' => 'Foto Tidak Boleh Kosong',
                    'max_size' => 'Ukuran Foto Profil tidak boleh lebih dari 100 KB',
                    'is_image' => 'Berkas harus berupa gambar',
                    'mime_in' => 'Berkas harus berupa gambar',
                ],
            ],

        ])) {
            // return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('siswa', $namaFoto);

        $npsnSekolah = $this->request->getVar('npsnSekolah');
        $lembaga = $this->request->getVar('lembaga');
        $nipd = $this->request->getVar('nipd');
        $nama_siswa = $this->request->getVar('nama_siswa');
        $email = $this->request->getVar('email');
        $status = 'aktif';

        $data = [
            'npsn' => $npsnSekolah,
            'lembaga' => $lembaga,
            'nipd' => $nipd,
            'nama_siswa' => $nama_siswa,
            'email' => $email,
            'foto' => $namaFoto,
            'status' => $status
        ];

        if ($this->siswaModel->save($data) == true) {
            return redirect()->to(base_url('daftar_siswa'))->with('success', 'Data Siswa Berhasil Disimpan');
        } else {
            return redirect()->back()->with('error', 'Data Siswa Gagal Disimpan');
        }
    }

    public function update_siswa($id)
    {
        // validation input
        if (!$this->validate([
            'lembaga' => [
                'rules' => 'permit_empty',
                'errors' => [],
            ],
            'nipd' => [
                'rules' => 'permit_empty|numeric|max_length[8]|min_length[8]',
                'errors' => [
                    'numeric' => 'NIS Hanya Bisa Diinputkan Dengan Angka',
                    'max_length' => 'Maximal NIP 8 Karakter',
                    'min_length' => 'Minimal NIP 8 Karakter',
                ],
            ],
            'nama_siswa' => [
                'rules' => 'permit_empty|alpha_space|max_length[100]',
                'errors' => [
                    'alpha_space' => 'Nama Siswa Hanya Bisa Diinputkan Dengan Huruf dan Spasi',
                    'max_length' => 'Maximal Nama Siswa 100 Karakter',
                ],
            ],
            'email' => [
                'rules' => 'permit_empty|valid_emails|max_length[50]',
                'errors' => [
                    'valid_emails' => 'Masukkan email yang valid',
                    'max_length' => 'Email maximum 50 characters',
                ],
            ],
            'foto' => [
                'rules' => 'permit_empty|max_size[foto,102]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Foto Profil tidak boleh lebih dari 100 KB',
                    'is_image' => 'Berkas harus berupa gambar',
                    'mime_in' => 'Berkas harus berupa gambar',
                ],
            ]
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }

        $lembaga    = $this->request->getVar('lembaga');
        if ($lembaga == null) {
            $dataLembaga = $this->request->getVar('lembagaLama');
        } else {
            $dataLembaga = $this->request->getVar('lembaga');
        }

        $nipd    = $this->request->getVar('nipd');
        if ($nipd == null) {
            $dataNipd = $this->request->getVar('nipdLama');
        } else {
            $dataNipd = $this->request->getVar('nipd');
        }

        $nama       = $this->request->getVar('nama_siswa');
        if ($nama == null) {
            $dataNama = $this->request->getVar('namaLama');
        } else {
            $dataNama = $this->request->getVar('nama_siswa');
        }

        $email       = $this->request->getVar('email');
        if ($email == null) {
            $dataEmail = $this->request->getVar('emailLama');
        } else {
            $dataEmail = $this->request->getVar('email');
        }

        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('siswa', $namaFoto);
            unlink('siswa/' . $this->request->getVar('fotoLama'));
        }

        $data = [
            'lembaga' => $dataLembaga,
            'nipd' => $dataNipd,
            'nama_siswa' => $dataNama,
            'email' => $dataEmail,
            'foto' => $namaFoto,
        ];

        // dd($data);
        if ($this->siswaModel->update($id, $data) == true) {
            return redirect()->to(base_url('daftar_siswa'))->with('success', 'Data Siswa Berhasil Diperbaharui');
        } else {
            return redirect()->back()->with('error', 'Data Siswa Gagal Diperbaharui');
        }
    }

    public function delete_siswa($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            return redirect()->back()->with('error', 'ID Siswa Tidak Valid');
        }
        $siswa = $this->siswaModel->find($id);

        if (!$siswa) {
            return redirect()->back()->with('error', 'Siswa Tidak Ditemukan');
        }

        if ($this->siswaModel->delete($id)) {
            return redirect()->to(base_url('daftar_siswa'))->with('success', 'Data Siswa Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Gagal Menghapus Data Siswa');
        }
    }
}
