<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\UserModel;
use App\Models\MenuModel;

class Dashboard extends BaseController
{
    protected $pesanan;
    protected $user;
    protected $menu;

    public function __construct()
    {
        $this->pesanan = new PesananModel();
        $this->user    = new UserModel();
        $this->menu    = new MenuModel();
    }

    public function index()
    {
        $today = date('Y-m-d');
        $month = date('Y-m');

        // ================= TRANSAKSI HARI INI =================

        $transaksi_hari_ini = $this->pesanan
            ->where('DATE(tanggal)', $today)
            ->countAllResults();

        // ================= OMZET HARI INI =================

        $omzet_hari_ini = $this->pesanan
            ->selectSum('total')
            ->where('DATE(tanggal)', $today)
            ->first()['total'] ?? 0;

        // ================= OMZET BULAN INI =================

        $omzet_bulan_ini = $this->pesanan
            ->selectSum('total')
            ->like('tanggal', $month, 'after')
            ->first()['total'] ?? 0;

        // ================= TOTAL USER =================

        $total_user = $this->user->countAll();

        // ================= GRAFIK PENJUALAN =================

        $grafik = $this->pesanan
            ->select('DATE(tanggal) as tanggal, SUM(total) as omzet')
            ->where('tanggal >=', date('Y-m-d', strtotime('-6 days')))
            ->groupBy('DATE(tanggal)')
            ->orderBy('tanggal', 'ASC')
            ->findAll();

        // ================= TOP MENU TERLARIS =================

        $top_menu = $this->menu
            ->select('menu.nama_menu, COUNT(detail_pesanan.id_menu) as total_terjual')
            ->join('detail_pesanan', 'detail_pesanan.id_menu = menu.id_menu')
            ->groupBy('menu.id_menu')
            ->orderBy('total_terjual', 'DESC')
            ->limit(5)
            ->findAll();

        // ================= DATA VIEW =================

        $data = [
            'transaksi_hari_ini' => $transaksi_hari_ini,
            'omzet_hari_ini'     => $omzet_hari_ini,
            'omzet_bulan_ini'    => $omzet_bulan_ini,
            'total_user'         => $total_user,
            'grafik'             => $grafik,
            'top_menu'           => $top_menu
        ];

        return view('owner/dashboard/index', $data);
    }
}