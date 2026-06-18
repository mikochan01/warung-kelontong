<?= $this->include('layout/header') ?>

<h2>Barang Keluar</h2>

<a href="/barang-keluar/tambah"
   class="btn btn-primary mb-3">
   Tambah Barang Keluar
</a>

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