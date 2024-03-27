<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduct extends Model
{
    protected $table = 't_produk';
    protected $primarykey = "id_produk";
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_barang', 'harga_beli', 'harga_jual', 'stok_barang', 'foto_barang', 'kategori_produk'];

    public function AllData()
    {
        return $this->db->table('t_produk')
            ->get()
            ->getResultArray();
    }

    public function DeleteData($data)
    {
        $this->db->table('t_produk')
            ->where('id_produk', $data['id_produk'])
            ->delete($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('t_produk')
            ->where('id_produk', $data['id_produk'])
            ->update($data);
    }
}
