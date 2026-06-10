<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;

class Produk extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();

        $data = [
            'title' => 'Kelola Produk',
            'produks' => $produkModel->getProductsWithCategory(),
        ];

        return view('admin/produk/index', $data);
    }

    public function tambah()
    {
        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Tambah Produk',
            'kategoris' => $kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/produk/form', $data);
    }

    public function simpan()
    {
        $produkModel = new ProdukModel();

        $rules = [
            'category_id' => 'required',
            'name'        => 'required|min_length[3]',
            'price'       => 'required|numeric',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $slug = url_title($this->request->getVar('name'), '-', true);

        $produkModel->save([
            'category_id' => $this->request->getVar('category_id'),
            'name'        => $this->request->getVar('name'),
            'slug'        => $slug . '-' . time(),
            'description' => $this->request->getVar('description'),
            'price'       => $this->request->getVar('price'),
            'image'       => $this->request->getVar('image'),
            'badge'       => $this->request->getVar('badge'),
            'specs'       => $this->request->getVar('specs'),
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Edit Produk',
            'produk' => $produkModel->find($id),
            'kategoris' => $kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/produk/form', $data);
    }

    public function update($id)
    {
        $produkModel = new ProdukModel();

        $rules = [
            'category_id' => 'required',
            'name'        => 'required|min_length[3]',
            'price'       => 'required|numeric',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $produkModel->update($id, [
            'category_id' => $this->request->getVar('category_id'),
            'name'        => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'price'       => $this->request->getVar('price'),
            'image'       => $this->request->getVar('image'),
            'badge'       => $this->request->getVar('badge'),
            'specs'       => $this->request->getVar('specs'),
        ]);

        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diupdate');
    }

    public function hapus($id)
    {
        $produkModel = new ProdukModel();
        $produkModel->delete($id);
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus');
    }
}
