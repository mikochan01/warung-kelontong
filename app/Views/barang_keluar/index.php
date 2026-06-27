<?= $this->include('layout/header') ?>

<h2>Barang Keluar</h2>

<a href="/barang-keluar/tambah"
   class="btn btn-primary mb-3">
   Tambah Barang Keluar
</a>

<form method="get" action="/barang-keluar" class="mb-3">

    <div class="row">

        <div class="col-md-3">
            <label class="form-label">Tanggal Awal</label>
            <input
                type="date"
                name="tanggal_awal"
                class="form-control"
                value="<?= $tanggalAwal ?? '' ?>"
            >
        </div>

        <div class="col-md-3">
            <label class="form-label">Tanggal Akhir</label>
            <input
                type="date"
                name="tanggal_akhir"
                class="form-control"
                value="<?= $tanggalAkhir ?? '' ?>"
            >
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-success w-100">
                Filter
            </button>
        </div>

        <div class="col-md-2 d-flex align-items-end">
            <a href="/barang-keluar" class="btn btn-secondary w-100">
                Reset
            </a>
        </div>

    </div>

</form>

<?php if(session()->getFlashdata('error')): ?>

    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>

<?php endif; ?>

<table class="table table-bordered">

<tr>
    <th>No</th>
    <th>Produk</th>
    <th>Jumlah</th>
    <th>Tanggal</th>
</tr>

<?php $no = 1; ?>

<?php foreach($barangKeluar as $b): ?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $b['nama_produk'] ?></td>
    <td><?= $b['jumlah'] ?></td>
    <td><?= $b['tanggal'] ?></td>
</tr>

<?php endforeach ?>

</table>

<?= $this->include('layout/footer') ?>