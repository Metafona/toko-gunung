<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\ProductVariantModel;

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
        $userId = session()->get('id');

        $productId = $this->request->getPost('product_id');
        $variantId = $this->request->getPost('variant_id');
        $quantity = $this->request->getPost('quantity') ?? 1;

        $existing = $keranjangModel->where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('variant_id', $variantId)
            ->first();

        if ($existing) {
            $keranjangModel->update($existing['id'], [
                'quantity' => $existing['quantity'] + $quantity
            ]);
        } else {
            $keranjangModel->save([
                'user_id'    => $userId,
                'product_id' => $productId,
                'variant_id' => $variantId,
                'quantity'   => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function update($id)
    {
        $keranjangModel = new KeranjangModel();
        $item = $keranjangModel->find($id);
        if (!$item || $item['user_id'] != session()->get('id')) {
            return redirect()->to('/keranjang')->with('error', 'Item tidak ditemukan');
        }

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
        $item = $keranjangModel->find($id);
        if (!$item || $item['user_id'] != session()->get('id')) {
            return redirect()->to('/keranjang')->with('error', 'Item tidak ditemukan');
        }
        $keranjangModel->delete($id);
        return redirect()->to('/keranjang')->with('success', 'Item dihapus dari keranjang');
    }
}
