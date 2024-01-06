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
        'status_gtk',
        'nip',
        'nuptk',
        'tmt_tugas',
        'tmt_pns'
    ];
}
