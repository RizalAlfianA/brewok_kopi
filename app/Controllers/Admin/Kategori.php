<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $builder = $this->kategori->getKategori($keyword);

        $data = [
            'title'     => 'Kategori Menu',
            'kategori'  => $builder->paginate(100),
            'pager'     => $this->kategori->pager,
            'keyword'   => $keyword
        ];

        return view('admin/kategori/index', $data);
    }

    public function create()
    {
        return view('admin/kategori/create');
    }

    public function store()
    {
        $this->kategori->save([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/admin/kategori');
    }

    public function edit($id)
    {
        $data = [
            'kategori' => $this->kategori->find($id)
        ];

        return view('admin/kategori/edit', $data);
    }

    public function update($id)
    {
        $this->kategori->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->to('/admin/kategori');
    }

    public function delete($id)
    {
        $this->kategori->delete($id);

        return redirect()->to('/admin/kategori');
    }
}