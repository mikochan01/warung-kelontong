<?= $this->include('layout/header') ?>

<h2>Data Kategori</h2>

<a href="/kategori/tambah" class="btn btn-primary mb-3">
    Tambah Kategori
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        <?php $no = 1; ?>

        <?php foreach($kategori as $k): ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $k['nama_kategori'] ?></td>
            
            <td>
                <a href="/kategori/edit/<?= $k['id'] ?>"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <a href="/kategori/hapus/<?= $k['id'] ?>"
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