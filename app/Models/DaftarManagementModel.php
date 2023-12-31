<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarManagementModel extends Model
{
    protected $table = 'management';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'nik',
        'nama_management',
        'alamat',
        'telp',
        'foto',
        'pesan'
    ];
}
