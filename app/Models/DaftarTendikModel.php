<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarTendikModel extends Model
{
    protected $table = 'tendik';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'npsn',
        'nik',
        'nama_tendik',
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

    public function getDataTendikWithManagement($npsn = null)
    {
        $builder = $this->db->table('tendik');
        $builder->select('tendik.*, management.*'); // Pilih kolom yang ingin ditampilkan
        $builder->join('management', 'management.npsn = tendik.npsn');
        if ($npsn !== null) {
            $builder->where('tendik.npsn', $npsn);
            $builder->where('tendik.status', 'aktif');
        }
        return $builder->get()->getResultArray();
    }

    public function getJenisPTK()
    {
        return $this->db->table('jenis_ptk')
            ->where('status', 'aktif')
            ->where("nama_jenisptk NOT LIKE '%Guru%'")
            ->orderBy('nama_jenisptk', 'ASC')
            ->get()->getResultArray();
    }
}
