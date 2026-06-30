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
        $this->menu      = new MenuModel();
        $this->kategori  = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Menu Brewok Kopi',
            'menu'  => $this->menu->getMenuKategori()
        ];

        return view('admin/menu/index', $data);
    }

    public function create()
    {
        $data = [
            'kategori' => $this->kategori->findAll()
        ];

        return view('admin/menu/create', $data);
    }

    public function store()
    {
        // ================= UPLOAD GAMBAR =================

        $file = $this->request->getFile('gambar');

        // default gambar
        $namaGambar = 'default.png';

        // jika user upload gambar
        if ($file && $file->getError() !== 4) {

            $namaGambar = $file->getRandomName();

            $file->move('assets/images/menu/', $namaGambar);
        }
        // ================= SIMPAN DATA =================

        $this->menu->save([
            'nama_menu'   => $this->request->getPost('nama_menu'),
            'harga'       => str_replace('.', '', $this->request->getPost('harga')),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'gambar'      => $namaGambar,
            'id_kategori' => $this->request->getPost('id_kategori')
        ]);

        return redirect()->to('/admin/menu');
    }

    public function edit($id)
    {
        $data = [
            'menu'      => $this->menu->find($id),
            'kategori'  => $this->kategori->findAll()
        ];

        return view('admin/menu/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_menu'    => $this->request->getPost('nama_menu'),
            'harga'        => $this->request->getPost('harga'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'id_kategori'  => $this->request->getPost('id_kategori')
        ];

        // ================= UPDATE GAMBAR =================

        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid()) {

            $namaGambar = $file->getRandomName();

            $file->move('assets/images/menu', $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        // ================= UPDATE DATA =================

        $this->menu->update($id, $data);

        return redirect()->to('/admin/menu');
    }

    public function delete($id)
    {
        $this->menu->delete($id);

        return redirect()->to('/admin/menu');
    }
}