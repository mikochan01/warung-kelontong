<?= $this->include('layout/header') ?>

    <h2 class="mb-4">
        Data Produk Warung
    </h2>

    <a href="/produk/tambah"
       class="btn btn-primary mb-3">
        + Tambah Produk
    </a>

    <table class="table table-bordered table-striped">

        <thead>

            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

        <?php $no=1; ?>
        <?php foreach($produk as $p): ?>

        <tr>

            <td><?= $no++ ?></td>

            <td><?= $p['nama_produk'] ?></td>

            <td>
                Rp <?= number_format($p['harga_jual'],0,',','.') ?>
            </td>

            <td><?= $p['stok'] ?></td>

            <td>

                <a href="/produk/edit/<?= $p['id'] ?>"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="/produk/hapus/<?= $p['id'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin hapus?')">
                    Hapus
                </a>

            </td>

        </tr>

        <?php endforeach ?>

        </tbody>

    </table>
<?= $this->include('layout/footer') ?>