<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\ProductVariantModel;
use App\Models\ReviewModel;

class Produk extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();

        $brand = $this->request->getGet('brand');

        if ($brand) {
            $produks = $produkModel->where('brand', ucfirst($brand))->findAll();
        } else {
            $produks = $produkModel->getProductsWithCategory();
        }

        $brands = $produkModel->select('brand')->distinct()->where('brand IS NOT NULL')->findAll();

        $data = [
            'title' => 'Katalog Produk',
            'produks' => $produks,
            'kategoris' => $kategoriModel->findAll(),
            'brands' => $brands,
            'brandAktif' => $brand,
        ];

        return view('produk/index', $data);
    }

    public function kategori($slug)
    {
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();

        $kategori = $kategoriModel->where('slug', $slug)->first();
        $produks = $produkModel->getProductsByCategory($slug);

        $brands = $produkModel->select('brand')->distinct()->where('brand IS NOT NULL')->findAll();

        $data = [
            'title' => 'Katalog - ' . ($kategori['name'] ?? ''),
            'produks' => $produks,
            'kategoris' => $kategoriModel->findAll(),
            'brands' => $brands,
            'kategoriAktif' => $slug,
        ];

        return view('produk/index', $data);
    }

    public function brand($brand)
    {
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();

        $produks = $produkModel->getProductsWithCategory();
        $produks = array_filter($produks, function ($p) use ($brand) {
            return strtolower($p['brand'] ?? '') === strtolower($brand);
        });

        $brands = $produkModel->select('brand')->distinct()->where('brand IS NOT NULL')->findAll();

        $data = [
            'title' => 'Brand - ' . ucfirst($brand),
            'produks' => $produks,
            'kategoris' => $kategoriModel->findAll(),
            'brands' => $brands,
            'brandAktif' => $brand,
        ];

        return view('produk/index', $data);
    }

    public function detail($slug)
    {
        $produkModel = new ProdukModel();
        $variantModel = new ProductVariantModel();
        $reviewModel = new ReviewModel();

        $produk = $produkModel->getProductBySlug($slug);

        if (!$produk) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $variants = $variantModel->getVariantsByProduct($produk['id']);
        $reviews = $reviewModel->getReviewsByProduct($produk['id']);
        $avgRating = $reviewModel->getAverageRating($produk['id']);
        $ratingCount = $reviewModel->getRatingCount($produk['id']);

        foreach ($reviews as &$review) {
            $review['replies'] = $reviewModel->getReplies($review['id']);
        }

        $data = [
            'title'       => $produk['name'],
            'produk'      => $produk,
            'variants'    => $variants,
            'reviews'     => $reviews,
            'avgRating'   => round($avgRating, 1),
            'ratingCount' => $ratingCount,
        ];

        return view('produk/detail', $data);
    }
}
