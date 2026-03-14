<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\KategoriModel;

class Menu extends BaseController
{
    protected $menu;
    protected $kategori;

    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Menu Brewok Kopi'
        ];

        $data['menu'] = $this->menu->getMenuKategori();
        return view('admin/menu/index', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->kategori->findAll();
        return view('admin/menu/create', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('gambar');
        $namaGambar = $file->getRandomName();
        $file->move('assets/images/menu', $namaGambar);

        $this->menu->save([
            'nama_menu' => $this->request->getPost('nama_menu'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaGambar,
            'id_kategori' => $this->request->getPost('id_kategori')
        ]);

        return redirect()->to('/admin/menu');
    }

    public function edit($id)
    {
        $data['menu'] = $this->menu->find($id);
        $data['kategori'] = $this->kategori->findAll();
        return view('admin/menu/edit', $data);
    }

    public function update($id)
    {
        $file = $this->request->getFile('gambar');

        if ($file->isValid()) {

            $namaGambar = $file->getRandomName();
            $file->move('assets/images/menu', $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        $data['nama_menu'] = $this->request->getPost('nama_menu');
        $data['harga'] = $this->request->getPost('harga');
        $data['deskripsi'] = $this->request->getPost('deskripsi');
        $data['id_kategori'] = $this->request->getPost('id_kategori');

        $this->menu->update($id, $data);

        return redirect()->to('/admin/menu');
    }

    public function delete($id)
    {
        $this->menu->delete($id);
        return redirect()->to('/admin/menu');
    }
}