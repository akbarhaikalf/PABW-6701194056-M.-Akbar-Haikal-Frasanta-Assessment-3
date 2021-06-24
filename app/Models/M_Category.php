<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Category extends Model
{
    protected $table = 'Akun';

    public function __construct()
    {

        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData()
    {
        return $this->db->table('akun')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('akun')->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table('akun')->delete(['id' => $id]);
    }
    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id' => $id]);
    }
}
