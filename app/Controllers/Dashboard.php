<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\BarangMasukModel;
use App\Models\BarangKeluarModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();
        $barangMasukModel = new BarangMasukModel();
        $barangKeluarModel = new BarangKeluarModel();

        $data['totalProduk'] = $produkModel->countAllResults();
        $data['totalKategori'] = $kategoriModel->countAllResults();
        $data['totalMasuk'] = $barangMasukModel->countAllResults();
        $data['totalKeluar'] = $barangKeluarModel->countAllResults();

        $data['totalStok'] = $produkModel
            ->selectSum('stok')
            ->first()['stok'];

        $data['stokMenipis'] = $produkModel
            ->where('stok <=', 5)
            ->countAllResults();

        $data['produkKritis'] = $produkModel
            ->where('stok <=', 5)
            ->findAll();

        $data['produkTerlaris'] = $barangKeluarModel
            ->select('produk.nama_produk, SUM(barang_keluar.jumlah) as total_terjual')
            ->join('produk', 'produk.id = barang_keluar.produk_id')
            ->groupBy('barang_keluar.produk_id')
            ->orderBy('total_terjual', 'DESC')
            ->first();

        return view('dashboard/index', $data);
    }
}