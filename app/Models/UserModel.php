<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = [
        'nama',
        'email',
        'password',
        'role'
    ];

    protected $useTimestamps = false;

    protected $returnType = 'array';

    public function getUser($keyword = null)
    {
        $builder = $this;

        if ($keyword) {
            $builder = $builder->groupStart()
                               ->like('nama', $keyword)
                               ->orLike('email', $keyword)
                               ->orLike('role', $keyword)
                               ->groupEnd();
        }

        return $builder;
    }
}