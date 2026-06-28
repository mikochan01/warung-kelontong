<?= $this->include('layout/header') ?>

<div class="container mt-4">

    <h2>Dashboard Warung</h2>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Total Produk</h5>
                <h2><?= $totalProduk ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Total Kategori</h5>
                <h2><?= $totalKategori ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Total Stok</h5>
                <h2><?= $totalStok ?></h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Stok Menipis</h5>
                <h2><?= $stokMenipis ?></h2>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="card p-3">
                <h5>Produk Terlaris</h5>

                <?php if ($produkTerlaris): ?>
                    <h4><?= $produkTerlaris['nama_produk'] ?></h4>
                    <small>
                        Total keluar:
                        <?= $produkTerlaris['total_terjual'] ?>
                    </small>
                <?php else: ?>
                    <small>Belum ada transaksi</small>
                <?php endif; ?>

            </div>


        <div class="card mt-4 p-4">
                <h4>Grafik Transaksi</h4>

                <canvas id="transaksiChart"></canvas>
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

<script>
const ctx = document.getElementById('transaksiChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Barang Masuk', 'Barang Keluar'],
        datasets: [{
            label: 'Jumlah Transaksi',
            data: [
                <?= $totalMasuk ?>,
                <?= $totalKeluar ?>
            ]
        }]
    }
});
</script>

<?= $this->include('layout/footer') ?>