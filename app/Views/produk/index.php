<?= $this->include('layout/header') ?>

    <h2 class="mb-4">
        Data Produk Warung
    </h2>

    <a href="/produk/tambah"
       class="btn btn-primary mb-3">
        + Tambah Produk
    </a>

    <form method="get" action="/produk" class="mb-3" id="searchForm">

    <div class="row">

        <div class="col-md-4">
            <input
                type="text"
                name="keyword"
                id="searchInput"
                class="form-control"
                placeholder="Cari produk..."
                value="<?= $_GET['keyword'] ?? '' ?>">
        </div>

        <div class="col-md-auto">
            <button class="btn btn-primary">
                Search
            </button>
        </div>

    </div>

</form>

    <table class="table table-bordered table-striped">

        <thead>

            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
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
            <td><?= $p['nama_kategori'] ?></td>
            <td>
                Rp <?= number_format($p['harga_jual'],0,',','.') ?>
            </td>
            <td>
                <?php if($p['stok'] <= 5): ?>
                    <span class="badge bg-danger">
                        <?= $p['stok'] ?>
                    </span>
                <?php else: ?>
                <?= $p['stok'] ?>
                <?php endif; ?>
            </td>

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

    <?= $pager->links() ?>

    <script>
const searchInput = document.getElementById('searchInput');
const searchForm = document.getElementById('searchForm');

let timer;

searchInput.addEventListener('input', function() {

    clearTimeout(timer);

    timer = setTimeout(function() {
        searchForm.submit();
    }, 500);

});
</script>
<?= $this->include('layout/footer') ?>