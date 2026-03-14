<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    protected $allowedFields = [
        'tanggal',
        'total',
        'id_user',
        'id_pembayaran',
        'status'
    ];

    public function getPesananLengkap()
    {
        return $this->db->table('pesanan')
            ->select('pesanan.*, users.nama, pembayaran.nama_metode')
            ->join('users', 'users.id_user = pesanan.id_user')
            ->join('pembayaran', 'pembayaran.id_pembayaran = pesanan.id_pembayaran')
            ->get()
            ->getResultArray();
    }
}