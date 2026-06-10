<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\PesananModel;
use App\Models\ItemPesananModel;

class Checkout extends BaseController
{
    public function index()
    {
        $keranjangModel = new KeranjangModel();
        $userId = session()->get('id');

        $items = $keranjangModel->getCartWithProduct($userId);
        if (empty($items)) {
            return redirect()->to('/keranjang')->with('error', 'Keranjang belanja kosong');
        }

        $data = [
            'title' => 'Checkout',
            'items' => $items,
            'total' => $keranjangModel->getTotal($userId),
        ];

        return view('checkout/index', $data);
    }

    public function process()
    {
        $keranjangModel = new KeranjangModel();
        $pesananModel = new PesananModel();
        $itemPesananModel = new ItemPesananModel();
        $userId = session()->get('id');

        $items = $keranjangModel->getCartWithProduct($userId);
        if (empty($items)) {
            return redirect()->to('/keranjang')->with('error', 'Keranjang belanja kosong');
        }

        $total = $keranjangModel->getTotal($userId);
        $address = $this->request->getPost('address');

        $pesananModel->save([
            'user_id'          => $userId,
            'total'            => $total,
            'status'           => 'pending',
            'shipping_address' => $address,
        ]);
        $orderId = $pesananModel->getInsertID();

        foreach ($items as $item) {
            $itemPesananModel->save([
                'order_id'   => $orderId,
                'product_id' => $item['product_id'],
                'quantity'   => $item['quantity'],
                'price'      => $item['price'],
            ]);
        }

        $keranjangModel->where('user_id', $userId)->delete();

        return redirect()->to('/')->with('success', 'Pesanan berhasil dibuat!');
    }
}
