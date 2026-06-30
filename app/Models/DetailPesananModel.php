<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPesananModel extends Model
{
    protected $table            = 'detail_pesanan';
    protected $primaryKey       = 'id_detail';

    protected $allowedFields    = [
        'id_pesanan',
        'id_menu',
        'qty',
        'harga',
        'subtotal'
    ];

    protected $returnType       = 'array';

    public function getDetailPesanan($id_pesanan)
    {
        return $this->db->table($this->table)
            ->select('detail_pesanan.*, menu.nama_menu')
            ->join('menu', 'menu.id_menu = detail_pesanan.id_menu')
            ->where('id_pesanan', $id_pesanan)
            ->get()
            ->getResultArray();
    }
}