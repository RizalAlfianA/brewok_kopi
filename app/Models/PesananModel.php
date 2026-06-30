<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'pesanan';
    protected $primaryKey       = 'id_pesanan';

    protected $allowedFields    = [
        'tanggal',
        'total',
        'id_user'
    ];

    protected $returnType       = 'array';

    public function getPesananLengkap()
    {
        return $this->db->table($this->table)
            ->select('pesanan.*, users.nama')
            ->join('users', 'users.id_user = pesanan.id_user')
            ->get()
            ->getResultArray();
    }
}