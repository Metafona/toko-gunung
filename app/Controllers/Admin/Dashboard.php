<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\PesananModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $pesananModel = new PesananModel();
        $userModel = new UserModel();

        $data = [
            'title' => 'Admin Dashboard',
            'totalProduk' => $produkModel->countAllResults(),
            'totalPesanan' => $pesananModel->countAllResults(),
            'totalUser' => $userModel->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }
}
