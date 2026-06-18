<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';

    protected $allowedFields = [
        'nama_produk',
        'kategori_id',
        'harga_beli',
        'harga_jual',
        'stok'
    ];

}