<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesananModel;

class Laporan extends BaseController
{
    protected $pesanan;

    public function __construct()
    {
        $this->pesanan = new PesananModel();
    }

    public function index()
    {
        $tanggal_awal  = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        // ================= FILTER LAPORAN =================

        if ($tanggal_awal && $tanggal_akhir) {

            $laporan = $this->pesanan
                ->where('DATE(tanggal) >=', $tanggal_awal)
                ->where('DATE(tanggal) <=', $tanggal_akhir)
                ->orderBy('tanggal', 'DESC')
                ->findAll();

        } else {

            $laporan = $this->pesanan
                ->orderBy('tanggal', 'DESC')
                ->findAll();
        }

        // ================= TOTAL OMZET =================

        $total = array_sum(array_column($laporan, 'total'));

        // ================= DATA VIEW =================

        $data = [
            'title'           => 'Laporan Penjualan',
            'laporan'         => $laporan,
            'total'           => $total,
            'tanggal_awal'    => $tanggal_awal,
            'tanggal_akhir'   => $tanggal_akhir
        ];

        return view('admin/laporan/index', $data);
    }
}