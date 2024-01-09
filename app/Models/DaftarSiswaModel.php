<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarSiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'npsn', 'nipd', 'nisn', 'nik', 'nama_siswa', 'tempat_lahir', 'tanggal_lahir',
        'jekel', 'agama', 'alamat', 'jenis_tinggal', 'alat_transportasi',
        'telp', 'skhun', 'penerima_kps', 'nomor_kps', 'namaortu_ayah',
        'namaortu_ibu', 'namawali', 'pekerjaan_ayah', 'pekerjaan_ibu',
        'pekerjaan_wali', 'penghasilan_ayah', 'penghasilan_ibu', 'penghasilan_wali',
        'tahunlahir_ayah', 'tahunlahir_ibu', 'tahunlahir_wali', 'pendidikan_ayah',
        'pendidikan_ibu', 'pendidikan_wali', 'nik_ayah', 'nik_ibu', 'nik_wali',
        'rombel', 'nomor_peserta_un', 'nomor_seri_ijazah', 'penerima_kip',
        'nomor_kip', 'nama_kip', 'nomor_kks', 'nomor_regis_kk', 'bank',
        'nomor_rekening', 'nama_rekening', 'layak_pip', 'alasan_pip',
        'kebutuhan_khusus', 'sekolah_asal', 'anak_ke', 'lintang', 'bujur',
        'nomor_kk', 'berat_badan', 'tinggi_badan', 'lingkar_kepala',
        'jumlah_saudara_kandung', 'jarak_sekolah'
    ];

    public function getTempatTinggal()
    {
        return $this->db->table('tempat_tinggal')
            ->where('status', 'aktif')
            ->orderBy('nama_tempat_tinggal', 'ASC')
            ->get()->getResultArray();
    }

    public function getTransportasi()
    {
        return $this->db->table('model_transportasi')
            ->where('status', 'aktif')
            ->orderBy('nama_transportasi', 'ASC')
            ->get()->getResultArray();
    }

    public function getPendidikan()
    {
        return $this->db->table('pendidikan')
            ->where('status', 'aktif')
            ->orderBy('nama_pendidikan', 'ASC')
            ->get()->getResultArray();
    }

    public function getPekerjaan()
    {
        return $this->db->table('pekerjaan')
            ->where('status', 'aktif')
            ->orderBy('nama_pekerjaan', 'ASC')
            ->get()->getResultArray();
    }

    public function getPenghasilan()
    {
        return $this->db->table('penghasilan')
            ->where('status', 'aktif')
            ->orderBy('nama_penghasilan', 'ASC')
            ->get()->getResultArray();
    }
}
