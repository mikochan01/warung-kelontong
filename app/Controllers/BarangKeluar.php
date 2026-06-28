<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\ProdukModel;
use App\Services\InventoryService;

class BarangKeluar extends BaseController
{
    protected BarangKeluarModel $barangKeluarModel;
    protected ProdukModel $produkModel;
    protected InventoryService $inventoryService;

    public function __construct()
    {
        $this->barangKeluarModel = new BarangKeluarModel();
        $this->produkModel = new ProdukModel();
        $this->inventoryService = new InventoryService();
    }

    public function index()
    {
        $tanggalAwal = $this->request->getGet('tanggal_awal');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');

        $data['barangKeluar'] =
            $this->barangKeluarModel
                ->getFilteredBarangKeluar(
                    $tanggalAwal,
                    $tanggalAkhir
                );

        $data['tanggalAwal'] = $tanggalAwal;
        $data['tanggalAkhir'] = $tanggalAkhir;

        return view('barang_keluar/index', $data);
    }

    public function tambah()
    {
        $data['produk'] = $this->produkModel->findAll();        
        
        return view('barang_keluar/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate('barangKeluar')) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'validation',
                    $this->validator
                );
    }

        $produkId = $this->request->getPost('produk_id');
        $jumlah = $this->request->getPost('jumlah');

        $result = $this->inventoryService->barangKeluar(
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