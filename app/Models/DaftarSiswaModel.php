<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarSiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'npsn',
        'nipd',
        'nisn',
        'nik',
        'nama_siswa',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jekel',
        'alamat',
        'jenis_tinggal',
        'alat_transportasi',
        'telp',
        'rombel',
        'nomor_peserta_un',
        'nomor_seri_ijazah',
        'skhun',
        'nomor_regis_kk',
        'nomor_kk',
        'penerima_kps',
        'layak_pip',
        'penerima_kip',
        'nomor_kps',
        'alasan_pip',
        'nomor_kip',
        'nama_kip',
        'nomor_kks',

        'kebutuhan_khusus',
        'sekolah_asal',
        'jumlah_saudara_kandung',
        'anak_ke',
        'berat_badan',
        'tinggi_badan',
        'lingkar_kepala',
        'lintang',
        'bujur',
        'jarak_sekolah',

        'nik_ayah',
        'namaortu_ayah',
        'tahunlahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',

        'nik_ibu',
        'namaortu_ibu',
        'tahunlahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',

        'nik_wali',
        'namawali',
        'tahunlahir_wali',
        'pekerjaan_wali',
        'pendidikan_wali',
        'penghasilan_wali',

        'bank',
        'nomor_rekening',
        'nama_rekening',

        'status',
    ];

    public function getDataSiswaWithManagement($npsn = null)
    {
        $builder = $this->db->table('siswa');
        $builder->select('siswa.*, management.*'); // Pilih kolom yang ingin ditampilkan
        $builder->join('management', 'management.npsn = siswa.npsn');
        if ($npsn !== null) {
            $builder->where('siswa.npsn', $npsn);
            $builder->where('siswa.status', 'aktif');
        }
        return $builder->get()->getResultArray();
    }

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

    public function getBank()
    {
        return $this->db->table('bank')
            ->where('status', 'aktif')
            ->orderBy('nama_bank', 'ASC')
            ->get()->getResultArray();
    }

    public function getKebutuhanKhusus()
    {
        return $this->db->table('kebutuhankhusus')
            ->where('status', 'aktif')
            ->orderBy('nama_kebutuhankhusus', 'ASC')
            ->get()->getResultArray();
    }
}
