<?php

namespace App\Controllers;

use App\Models\PesananModel;

class Orders extends BaseController
{
    public function index()
    {
        $pesananModel = new PesananModel();
        $data = [
            'title' => 'Pesanan Saya',
            'orders' => $pesananModel->getOrdersByUser(session()->get('id')),
        ];
        return view('orders/index', $data);
    }

    public function detail($id)
    {
        $pesananModel = new PesananModel();
        $order = $pesananModel->find($id);

        if (!$order || $order['user_id'] != session()->get('id')) {
            return redirect()->to('/orders')->with('error', 'Pesanan tidak ditemukan');
        }

        $items = $pesananModel->getOrderWithItems($id);

        $data = [
            'title' => 'Detail Pesanan',
            'order' => $order,
            'items' => $items,
        ];
        return view('orders/detail', $data);
    }
}
