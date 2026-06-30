<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // ================= CEK LOGIN =================

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        // ================= DATA DASHBOARD =================

        $totalMenu = $this->db
            ->table('menu')
            ->countAllResults();

        $totalKategori = $this->db
            ->table('kategori')
            ->countAllResults();

        $transaksiHariIni = $this->db
            ->table('pesanan')
            ->where('DATE(tanggal)', date('Y-m-d'))
            ->countAllResults();

        $omzetHariIni = $this->db
            ->table('pesanan')
            ->selectSum('total')
            ->where('DATE(tanggal)', date('Y-m-d'))
            ->get()
            ->getRow()
            ->total ?? 0;

        // ================= DATA VIEW =================

        $data = [
            'title'             => 'Dashboard Brewok Kopi',
            'totalMenu'         => $totalMenu,
            'totalKategori'     => $totalKategori,
            'transaksiHariIni'  => $transaksiHariIni,
            'omzetHariIni'      => $omzetHariIni
        ];

        return view('admin/dashboard/index', $data);
    }
}