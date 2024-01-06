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
        'status_gtk',
        'nip',
        'nuptk',
        'tmt_tugas',
        'tmt_pns'
    ];
}
