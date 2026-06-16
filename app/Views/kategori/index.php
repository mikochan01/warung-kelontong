<?= $this->include('layout/header') ?>

<h2>Data Kategori</h2>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>

    <tbody>

        <?php $no = 1; ?>

        <?php foreach($kategori as $k): ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $k['nama_kategori'] ?></td>
        </tr>

        <?php endforeach ?>

    </tbody>

</table>

<?= $this->include('layout/footer') ?>