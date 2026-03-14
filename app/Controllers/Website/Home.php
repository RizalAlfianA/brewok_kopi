<?php

namespace App\Controllers\Website;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('website/home/index');
    }
}