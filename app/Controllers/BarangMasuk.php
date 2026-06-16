<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;
use App\Models\ProdukModel;

class BarangMasuk extends BaseController
{
    public function index()
    {
        $model = new BarangMasukModel();

        $data['barangMasuk'] = $model
            ->select('barang_masuk.*, produk.nama_produk')
            ->join('produk', 'produk.id = barang_masuk.produk_id')
            ->findAll();

        return view('barang_masuk/index', $data);
    }

    public function tambah()
    {
        $produkModel = new ProdukModel();
        $data['produk'] = $produkModel->findAll();
        return view('barang_masuk/tambah', $data);
    }

    public function simpan()
    {
        $barangMasukModel = new BarangMasukModel();
        $produkModel = new ProdukModel();

        $produkId = $this->request->getPost('produk_id');
        $jumlah = $this->request->getPost('jumlah');

        $barangMasukModel->save([
            'produk_id' => $produkId,
            'jumlah' => $jumlah
        ]);

        $produk = $produkModel->find($produkId);

        $stokBaru = $produk['stok'] + $jumlah;

        $produkModel->update($produkId, [
            'stok' => $stokBaru
        ]);

        return redirect()->to('/barang-masuk');
    }
}