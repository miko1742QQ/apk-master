<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarKaryawanEditModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'nik';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id_karyawan',
        'nik',
        'nama_karyawan',
        'foto'
    ];
}
