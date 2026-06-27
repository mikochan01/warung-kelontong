<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\ProdukModel;
use App\Services\InventoryService;

class BarangKeluar extends BaseController
{
    public function index()
    {
        $model = new BarangKeluarModel();
        $tanggalAwal = $this->request->getGet('tanggal_awal');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');

        $query = $model
            ->select('barang_keluar.*, produk.nama_produk')
            ->join('produk', 'produk.id = barang_keluar.produk_id');
        
        if ($tanggalAwal && $tanggalAkhir) {
            $query->where('tanggal >=', $tanggalAwal . ' 00:00:00');
            $query->where('tanggal <=', $tanggalAkhir . ' 23:59:59');        }

        $data['barangKeluar'] = $query->findAll();
        $data['tanggalAwal'] = $tanggalAwal;
        $data['tanggalAkhir'] = $tanggalAkhir;

        return view('barang_keluar/index', $data);
    }

    public function tambah()
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();
        return view('barang_keluar/tambah', $data);
    }

    public function simpan()
    {
    $inventoryService = new InventoryService();

    $produkId = $this->request->getPost('produk_id');
    $jumlah = $this->request->getPost('jumlah');

    $result = $inventoryService->barangKeluar(
        $produkId,
        $jumlah
    );

    if (!$result['success']) {
        return redirect()
            ->to('/barang-keluar')
            ->with('error', $result['message']);
    }

    return redirect()->to('/barang-keluar');
    }
}