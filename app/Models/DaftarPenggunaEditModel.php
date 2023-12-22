<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftarPenggunaEditModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'nik';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = [
        'nik',
        'id_role',
        'email',
        'username',
        'password',
        'password_hash',
        'active',
        'force_pass_reset',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getPengguna()
    {
        return $this->db->table('users')
            ->distinct()
            ->select('users.id, users.username, users.active, karyawan.nama_karyawan, karyawan.foto, role.nama_role, ')
            ->join('role', 'role.id_role=users.id_role')
            ->join('karyawan', 'karyawan.nik=users.nik')
            ->get()->getResultArray();
    }

    public function getPenggunaID($id)
    {
        return $this->db->table('users')
            ->distinct()
            ->select('users.id, users.username, users.active, karyawan.nama_karyawan, karyawan.foto, role.nama_role, ')
            ->join('role', 'role.id_role=users.id_role')
            ->join('karyawan', 'karyawan.nik=users.nik')
            ->where('users.id', $id)
            ->get()->getResultArray();
    }
}
