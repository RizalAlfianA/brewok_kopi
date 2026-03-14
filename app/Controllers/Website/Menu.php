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

        $data['menu'] = $this->menu->getMenuKategori();

        return view('website/menu/index', $data);
    }

}