<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();

        $data['totalProduk'] = $produkModel->countAllResults();
        $data['totalKategori'] = $kategoriModel->countAllResults();

        $data['totalStok'] = $produkModel
            ->selectSum('stok')
            ->first()['stok'];

        $data['stokMenipis'] = $produkModel
            ->where('stok <=', 5)
            ->countAllResults();

        $data['produkKritis'] = $produkModel
            ->where('stok <=', 5)
            ->findAll();

        return view('dashboard/index', $data);
    }
}