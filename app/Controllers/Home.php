<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;

class Home extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Beranda',
            'kategoris' => $kategoriModel->findAll(),
            'produkTerbaru' => $produkModel->getFeaturedProducts(4),
            'produkKatalog' => $produkModel->getProductsWithCategory(),
        ];

        return view('beranda', $data);
    }
}
