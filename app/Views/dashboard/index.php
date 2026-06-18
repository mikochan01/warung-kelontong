<?= $this->include('layout/header') ?>

<div class="container mt-4">

    <h2>Dashboard Warung</h2>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card p-3">
                <h5>Total Produk</h5>
                <h2><?= $totalProduk ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>Total Kategori</h5>
                <h2><?= $totalKategori ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>Total Stok</h5>
                <h2><?= $totalStok ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3">
                <h5>Stok Menipis</h5>
                <h2><?= $stokMenipis ?></h2>
            </div>
        </div>

    </div>

</div>

<?php if(count($produkKritis) > 0): ?>

<div class="alert alert-warning mt-4">

    <h5>⚠ Produk Hampir Habis</h5>

    <table class="table table-bordered mt-3">

        <tr>
            <th>Produk</th>
            <th>Stok</th>
        </tr>

        <?php foreach($produkKritis as $p): ?>

        <tr>
            <td><?= $p['nama_produk'] ?></td>
            <td><?= $p['stok'] ?></td>
        </tr>

        <?php endforeach ?>

    </table>

</div>

<?php endif; ?>

<?= $this->include('layout/footer') ?>