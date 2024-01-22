<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarPendikModel extends Model
{
    protected $table = 'pendik';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'npsn',
        'nik',
        'nama_pendik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jekel',
        'alamat',
        'telp',
        'email',
        'status_gtk',
        'nip',
        'nuptk',
        'tmt_tugas',
        'tmt_pns',
        'jenis_ptk',
        'status',
    ];

    public function getDataPendikWithManagement($npsn = null)
    {
        $builder = $this->db->table('pendik');
        $builder->select('pendik.*, management.*'); // Pilih kolom yang ingin ditampilkan
        $builder->join('management', 'management.npsn = pendik.npsn');
        if ($npsn !== null) {
            $builder->where('pendik.npsn', $npsn);
            $builder->where('pendik.status', 'aktif');
        }
        return $builder->get()->getResultArray();
    }

    public function getJenisPTK()
    {
        return $this->db->table('jenis_ptk')
            ->where('status', 'aktif')
            ->where("nama_jenisptk LIKE '%Guru%'")
            ->orderBy('nama_jenisptk', 'ASC')
            ->get()->getResultArray();
    }
}
