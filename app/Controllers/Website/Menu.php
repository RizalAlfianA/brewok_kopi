<?php

namespace App\Controllers\Website;

use App\Controllers\BaseController;
use App\Models\MenuModel;

class Menu extends BaseController
{

    protected $menu;

    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function index()
    {
        $kategoriModel = new \App\Models\KategoriModel();
        $menuModel = new \App\Models\MenuModel();

        // ambil kategori
        $kategori = $kategoriModel->findAll();

        // ambil parameter filter
        $id_kategori = $this->request->getGet('kategori');

        if ($id_kategori) {
            $menu = $menuModel
                ->where('id_kategori', $id_kategori)
                ->findAll();
        } else {
            $menu = $menuModel->findAll();
        }

        $data = [
            'kategori' => $kategori,
            'menu'     => $menu
        ];

        return view('website/menu/index', $data);
    }

    public function menu()
    {
        $kategoriModel = new \App\Models\KategoriModel();
        $menuModel = new \App\Models\MenuModel();

        $data['kategori'] = $kategoriModel->findAll();

        $id_kategori = $this->request->getGet('kategori');

        if ($id_kategori) {
            $data['menu'] = $menuModel
                ->where('id_kategori', $id_kategori)
                ->findAll();
        } else {
            $data['menu'] = $menuModel->findAll();
        }

        return view('website/menu', $data);
    }

}