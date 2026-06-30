<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menu';
    protected $primaryKey       = 'id_menu';

    protected $allowedFields    = [
        'nama_menu',
        'harga',
        'deskripsi',
        'gambar',
        'id_kategori'
    ];

    protected $returnType       = 'array';

    public function getMenuKategori()
    {
        return $this->db->table($this->table)
            ->select('menu.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = menu.id_kategori')
            ->get()
            ->getResultArray();
    }
}