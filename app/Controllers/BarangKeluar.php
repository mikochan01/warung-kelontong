<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\ProdukModel;

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
            $query->where('tanggal >=', $tanggalAwal);
            $query->where('tanggal <=', $tanggalAkhir);
        }

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
        $barangKeluarModel = new BarangKeluarModel();
        $produkModel = new ProdukModel();

        $produkId = $this->request->getPost('produk_id');
        $jumlah = $this->request->getPost('jumlah');

        $produk = $produkModel->find($produkId);

        if ($jumlah > $produk['stok']) {
            return redirect()
                ->to('/barang-keluar')
                ->with('error', 'Stok tidak mencukupi');
        }

        $barangKeluarModel->save([
            'produk_id' => $produkId,
            'jumlah' => $jumlah
        ]);

        $stokBaru = $produk['stok'] - $jumlah;

        $produkModel->update($produkId, [
            'stok' => $stokBaru
        ]);

        return redirect()->to('/barang-keluar');
    }
}