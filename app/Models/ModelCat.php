<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCat extends Model
{
    protected $table = 't_kategori';
    protected $primarykey = "code_category";
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kategori'];

    public function AllData()
    {
        return $this->db->table('t_kategori')
            ->get()
            ->getResultArray();
    }
}
