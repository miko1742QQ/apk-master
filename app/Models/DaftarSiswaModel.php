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
        'lembaga',
        'nipd',
        'nama_siswa',
        'email',
        'foto',
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

    public function getLembaga()
    {
        return $this->db->table('lembaga')
            ->where('status', 'aktif')
            ->orderBy('nama_lembaga', 'ASC')
            ->get()->getResultArray();
    }
}
