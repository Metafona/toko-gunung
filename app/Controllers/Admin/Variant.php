<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductVariantModel;

class Variant extends BaseController
{
    public function index($productId)
    {
        $variantModel = new ProductVariantModel();
        $data = [
            'title' => 'Kelola Varian',
            'product_id' => $productId,
            'variants' => $variantModel->getVariantsByProduct($productId),
        ];
        return view('admin/variant/index', $data);
    }

    public function simpan($productId)
    {
        $variantModel = new ProductVariantModel();

        $names = $this->request->getPost('name');
        if (!$names) {
            return redirect()->back()->with('error', 'Tambahkan minimal satu varian');
        }

        $prices = $this->request->getPost('price_adjustment');
        $stocks = $this->request->getPost('stock');
        $skus = $this->request->getPost('sku');

        $variantModel->where('product_id', $productId)->delete();

        foreach ($names as $i => $name) {
            if (empty($name)) continue;

            $data = [
                'product_id'       => $productId,
                'name'             => $name,
                'price_adjustment' => $prices[$i] ?? 0,
                'stock'            => $stocks[$i] ?? 0,
                'sku'              => $skus[$i] ?? null,
            ];

            $files = $this->request->getFileMultiple('variant_images');
            if ($files && isset($files[$i]) && $files[$i]->isValid() && !$files[$i]->hasMoved()) {
                $newName = $files[$i]->getRandomName();
                $files[$i]->move(FCPATH . 'uploads/products', $newName);
                $data['image'] = base_url('uploads/products/' . $newName);
            }

            $variantModel->save($data);
        }

        return redirect()->to('/admin/produk/edit/' . $productId)->with('success', 'Varian berhasil disimpan');
    }
}
