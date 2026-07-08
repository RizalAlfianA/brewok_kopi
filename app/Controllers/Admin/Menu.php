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
        $keyword = $this->request->getGet('keyword');

        $builder = $this->menu->getMenuKategori($keyword);

        $data = [
            'title'   => 'Menu Brewok Kopi',
            'menu'    => $builder->paginate(100),
            'pager'   => $this->menu->pager,
            'keyword' => $keyword
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
        // ================= VALIDASI =================

        $validation = \Config\Services::validation();

        $rules = [
            'gambar' => [
                'rules' => 'permit_empty|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp,image/gif]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'File yang dipilih harus berupa gambar.',
                    'mime_in'  => 'Format gambar harus JPG, JPEG, PNG, WEBP, atau GIF.',
                    'max_size' => 'Ukuran gambar maksimal 2 MB.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // ================= UPLOAD GAMBAR =================

        $file = $this->request->getFile('gambar');

        $namaGambar = 'default.png';

        if ($file && $file->getError() != 4) {

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

        return redirect()->to('/admin/menu')
                        ->with('success', 'Menu berhasil ditambahkan.');
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
            'nama_menu'   => $this->request->getPost('nama_menu'),
            'harga'       => str_replace('.', '', $this->request->getPost('harga')),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'id_kategori' => $this->request->getPost('id_kategori')
        ];

        // ================= VALIDASI GAMBAR =================

        $file = $this->request->getFile('gambar');

        if ($file && $file->getError() != 4) {

            $rules = [
                'gambar' => [
                    'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp,image/gif]|max_size[gambar,2048]',
                    'errors' => [
                        'is_image' => 'File yang dipilih harus berupa gambar.',
                        'mime_in'  => 'Format gambar harus JPG, JPEG, PNG, WEBP, atau GIF.',
                        'max_size' => 'Ukuran gambar maksimal 2 MB.'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $namaGambar = $file->getRandomName();

            $file->move('assets/images/menu/', $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        // ================= UPDATE DATA =================

        $this->menu->update($id, $data);

        return redirect()->to('/admin/menu')
                        ->with('success', 'Menu berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->menu->delete($id);

        return redirect()->to('/admin/menu');
    }
}