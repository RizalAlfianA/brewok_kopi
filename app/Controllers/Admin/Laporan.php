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
        $data = [
            'title' => 'Laporan Penjualan'
        ];

        $tanggal_awal = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {

            $data['laporan'] = $this->pesanan
                ->where('DATE(tanggal) >=', $tanggal_awal)
                ->where('DATE(tanggal) <=', $tanggal_akhir)
                ->findAll();

        } else {

            $data['laporan'] = $this->pesanan
                ->orderBy('tanggal','DESC')
                ->findAll();
        }

        $data['total'] = array_sum(array_column($data['laporan'], 'total'));

        return view('admin/laporan/index', $data);
    }

}