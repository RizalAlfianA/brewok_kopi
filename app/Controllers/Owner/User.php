<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen User',
            'users' => $this->user->findAll()
        ];

        return view('owner/user/index', $data);
    }

    public function create()
    {
        return view('owner/user/create', [
            'title' => 'Tambah User'
        ]);
    }

    public function store()
    {
        $this->user->insert([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role' => $this->request->getPost('role')
        ]);

        return redirect()->to('/owner/user');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->user->find($id)
        ];

        return view('owner/user/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role')
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $this->user->update($id, $data);

        return redirect()->to('/owner/user');
    }

    public function delete($id)
    {
        $this->user->delete($id);

        return redirect()->to('/owner/user');
    }
}