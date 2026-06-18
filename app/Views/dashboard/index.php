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

<?= $this->include('layout/footer') ?>