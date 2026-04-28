<?php

namespace App\Controllers\Kasir;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\PesananModel;
use App\Models\DetailPesananModel;

class Pos extends BaseController
{
    protected $menu;

    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'POS Kasir'
        ];

        $data['menu'] = $this->menu->getMenuKategori();

        return view('kasir/pos/index', $data);
    }

    public function simpan()
    {
        $pesananModel = new PesananModel();
        $detailModel = new DetailPesananModel();

        $data = $this->request->getJSON();

        $total = $data->total;
        $bayar = $data->bayar;
        $kembalian = $data->kembalian;
        $items = $data->items;

        $id_user = session()->get('id_user');

        $pesananModel->insert([
            'tanggal' => date('Y-m-d H:i:s'),
            'total' => $total,
            'bayar' => $bayar,
            'kembalian' => $kembalian,
            'id_user' => $id_user
        ]);

        $id_pesanan = $pesananModel->insertID();

        foreach ($items as $item) {

            $detailModel->insert([
                'id_pesanan' => $id_pesanan,
                'id_menu' => $item->id,
                'qty' => $item->qty,
                'harga' => $item->harga,
                'subtotal' => $item->subtotal
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success'
        ]);
    }
}