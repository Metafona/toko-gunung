<?php

namespace App\Controllers;

use App\Models\KeranjangModel;
use App\Models\PesananModel;
use App\Models\ItemPesananModel;
use App\Models\UserAddressModel;

class Checkout extends BaseController
{
    public function index()
    {
        $keranjangModel = new KeranjangModel();
        $addressModel = new UserAddressModel();
        $userId = session()->get('id');

        $items = $keranjangModel->getCartWithProduct($userId);
        if (empty($items)) {
            return redirect()->to('/keranjang')->with('error', 'Keranjang belanja kosong');
        }

        $data = [
            'title'     => 'Checkout',
            'items'     => $items,
            'total'     => $keranjangModel->getTotal($userId),
            'addresses' => $addressModel->getAddressesByUser($userId),
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
        $addressId = $this->request->getPost('address_id');
        $manualAddress = $this->request->getPost('address');

        if ($addressId) {
            $addressModel = new UserAddressModel();
            $addr = $addressModel->find($addressId);
            $shippingAddress = $addr['recipient'] . ' - ' . $addr['phone'] . "\n" . $addr['address'] . ', ' . $addr['city'] . ', ' . $addr['province'] . ' ' . $addr['postal_code'];
        } else {
            $shippingAddress = $manualAddress;
        }

        if (empty($shippingAddress)) {
            return redirect()->back()->with('error', 'Alamat pengiriman harus diisi');
        }

        $pesananModel->save([
            'user_id'          => $userId,
            'total'            => $total,
            'status'           => 'pending',
            'shipping_address' => $shippingAddress,
            'address_id'       => $addressId ?: null,
        ]);
        $orderId = $pesananModel->getInsertID();

        foreach ($items as $item) {
            $price = $item['price'] + ($item['price_adjustment'] ?? 0);
            $itemPesananModel->save([
                'order_id'     => $orderId,
                'product_id'   => $item['product_id'],
                'variant_id'   => $item['variant_id'],
                'variant_name' => $item['variant_name'],
                'quantity'     => $item['quantity'],
                'price'        => $price,
            ]);
        }

        $keranjangModel->where('user_id', $userId)->delete();

        return redirect()->to('/orders')->with('success', 'Pesanan berhasil dibuat!');
    }
}
