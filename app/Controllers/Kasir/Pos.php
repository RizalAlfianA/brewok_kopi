<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\KategoriModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;

class Pos extends BaseController
{
    protected $menu;
    protected $kategori;
    protected $pesanan;
    protected $detailPesanan;

    public function __construct()
    {
        $this->menu          = new MenuModel();
        $this->kategori      = new KategoriModel();
        $this->pesanan       = new PesananModel();
        $this->detailPesanan = new DetailPesananModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'POS Kasir',
            'menu'     => $this->menu->getMenuKategori(),
            'kategori' => $this->kategori->findAll()
        ];

        return view('kasir/pos/index', $data);
    }

    public function simpan()
    {
        // ================= AMBIL DATA JSON =================

        $data = $this->request->getJSON();

        $total = $data->total;
        $items = $data->items;

        $id_user = session()->get('id_user');

        // ================= SIMPAN PESANAN =================

        $this->pesanan->insert([
            'tanggal' => date('Y-m-d H:i:s'),
            'total'   => $total,
            'id_user' => $id_user
        ]);

        $id_pesanan = $this->pesanan->insertID();

        // ================= SIMPAN DETAIL PESANAN =================

        foreach ($items as $item) {

            $this->detailPesanan->insert([
                'id_pesanan' => $id_pesanan,
                'id_menu'    => $item->id,
                'qty'        => $item->qty,
                'harga'      => $item->harga,
                'subtotal'   => $item->subtotal
            ]);
        }

        // ================= RESPONSE =================

        return $this->response->setJSON([
            'status'     => 'success',
            'id_pesanan' => $id_pesanan
        ]);
    }
}