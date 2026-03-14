<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
            if (!session()->get('logged_in')) {
            return redirect()->to('login');
        }

        $data = [
            'title' => 'Dashboard Brewok Kopi'
        ];

        return view('admin/dashboard/index');
    }
}