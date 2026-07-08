<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $primaryKey = 'id_kategori';

    protected $allowedFields = [
        'nama_kategori'
    ];

    protected $returnType = 'array';

    public function getKategori($keyword = null)
    {
        $builder = $this;

        if ($keyword) {
            $builder = $builder->like('nama_kategori', $keyword);
        }

        return $builder;
    }
}