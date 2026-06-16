<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table = 'barang_masuk';

    protected $allowedFields = [
        'produk_id',
        'jumlah',
        'tanggal'
    ];
}