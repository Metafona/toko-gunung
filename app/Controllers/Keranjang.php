<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\ProdukModel;

class Keranjang extends BaseController
{
    public function index()
    {
        $keranjangModel = new KeranjangModel();
        $userId = session()->get('id');

        $data = [
            'title' => 'Keranjang Belanja',
            'items' => $keranjangModel->getCartWithProduct($userId),
            'total' => $keranjangModel->getTotal($userId),
        ];

        return view('keranjang/index', $data);
    }

    public function tambah()
    {
        $keranjangModel = new KeranjangModel();
        $produkModel = new ProdukModel();
        $userId = session()->get('id');

        $productId = $this->request->getPost('product_id');

        $existing = $keranjangModel->where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existing) {
            $keranjangModel->update($existing['id'], [
                'quantity' => $existing['quantity'] + ($this->request->getPost('quantity') ?? 1)
            ]);
        } else {
            $keranjangModel->save([
                'user_id'    => $userId,
                'product_id' => $productId,
                'quantity'   => $this->request->getPost('quantity') ?? 1,
            ]);
        }

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function update($id)
    {
        $keranjangModel = new KeranjangModel();
        $quantity = $this->request->getPost('quantity');

        if ($quantity > 0) {
            $keranjangModel->update($id, ['quantity' => $quantity]);
        } else {
            $keranjangModel->delete($id);
        }

        return redirect()->to('/keranjang');
    }

    public function hapus($id)
    {
        $keranjangModel = new KeranjangModel();
        $keranjangModel->delete($id);
        return redirect()->to('/keranjang')->with('success', 'Item dihapus dari keranjang');
    }
}
