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

        $db = \Config\Database::connect();

        $totalMenu = $db->table('menu')->countAllResults();
        $totalKategori = $db->table('kategori')->countAllResults();

        $transaksiHariIni = $db->table('pesanan')
            ->where('DATE(tanggal)', date('Y-m-d'))
            ->countAllResults();

        $omzetHariIni = $db->table('pesanan')
            ->selectSum('total')
            ->where('DATE(tanggal)', date('Y-m-d'))
            ->get()
            ->getRow()
            ->total ?? 0;

        $data = [
            'title' => 'Dashboard Brewok Kopi',
            'totalMenu' => $totalMenu,
            'totalKategori' => $totalKategori,
            'transaksiHariIni' => $transaksiHariIni,
            'omzetHariIni' => $omzetHariIni
        ];

        return view('admin/dashboard/index', $data);
    }
}