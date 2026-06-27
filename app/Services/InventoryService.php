<?php

namespace App\Services;

use App\Models\ProdukModel;
use App\Models\BarangKeluarModel;

class InventoryService
{
    protected $produkModel;
    protected $barangKeluarModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->barangKeluarModel = new BarangKeluarModel();
    }

    public function barangKeluar($produkId, $jumlah)
    {
        $produk = $this->produkModel->find($produkId);

        if (!$produk) {
            return [
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ];
        }

        if ($jumlah > $produk['stok']) {
            return [
                'success' => false,
                'message' => 'Stok tidak mencukupi'
            ];
        }

        $this->barangKeluarModel->save([
            'produk_id' => $produkId,
            'jumlah' => $jumlah
        ]);

        $stokBaru = $produk['stok'] - $jumlah;

        $this->produkModel->update($produkId, [
            'stok' => $stokBaru
        ]);

        return [
            'success' => true
        ];
    }
}