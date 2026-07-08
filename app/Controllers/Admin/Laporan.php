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

        // Query dasar
        $builder = $this->pesanan->orderBy('tanggal', 'DESC');

        // Filter tanggal
        if ($tanggal_awal && $tanggal_akhir) {
            $builder->where('DATE(tanggal) >=', $tanggal_awal)
                    ->where('DATE(tanggal) <=', $tanggal_akhir);
        }

        // Pagination 100 data per halaman
        $laporan = $builder->paginate(100);

        // Hitung total omzet (seluruh data sesuai filter)
        $totalBuilder = clone $this->pesanan;

        if ($tanggal_awal && $tanggal_akhir) {
            $totalBuilder->where('DATE(tanggal) >=', $tanggal_awal)
                        ->where('DATE(tanggal) <=', $tanggal_akhir);
        }

        $total = array_sum(array_column($totalBuilder->findAll(), 'total'));

        $data = [
            'title'          => 'Laporan Penjualan',
            'laporan'        => $laporan,
            'pager'          => $this->pesanan->pager,
            'total'          => $total,
            'tanggal_awal'   => $tanggal_awal,
            'tanggal_akhir'  => $tanggal_akhir
        ];

        return view('admin/laporan/index', $data);
    }
}