<?php

namespace App\Controllers\Website;

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
            'kategori' => $this->kategori->findAll(),
            'menu'     => $this->getMenuByKategori()
        ];

        return view('website/menu/index', $data);
    }

    public function menu()
    {
        $data = [
            'kategori' => $this->kategori->findAll(),
            'menu'     => $this->getMenuByKategori()
        ];

        return view('website/menu', $data);
    }

    // ================= FILTER MENU =================

    private function getMenuByKategori()
    {
        $id_kategori = $this->request->getGet('kategori');

        if ($id_kategori) {

            return $this->menu
                ->where('id_kategori', $id_kategori)
                ->findAll();
        }

        return $this->menu->findAll();
    }
}