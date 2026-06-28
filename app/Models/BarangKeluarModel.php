<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table = 'barang_keluar';

    protected $allowedFields = [
        'produk_id',
        'jumlah',
        'tanggal'
    ];

    public function getFilteredBarangKeluar(
        $tanggalAwal = null,
        $tanggalAkhir = null
    )
    {
        $query = $this
            ->select('barang_keluar.*, produk.nama_produk')
            ->join('produk', 'produk.id = barang_keluar.produk_id');

        if ($tanggalAwal && $tanggalAkhir) {
            $query->where(
                'tanggal >=',
                $tanggalAwal . ' 00:00:00'
            );

            $query->where(
                'tanggal <=',
                $tanggalAkhir . ' 23:59:59'
            );
        }

        return $query->findAll();
    }
}