<?php

namespace App\Controllers\Website;

use App\Controllers\BaseController;

class Tentang extends BaseController
{
    public function index()
    {
        return view('website/tentang/index');
    }
}