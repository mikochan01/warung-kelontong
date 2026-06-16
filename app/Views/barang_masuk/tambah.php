<?= $this->include('layout/header') ?>

<div class="container mt-4">

<h2>Tambah Barang Masuk</h2>

<form action="/barang-masuk/simpan" method="post">

    <div class="mb-3">

        <label class="form-label">
            Produk
        </label>

        <select
            name="produk_id"
            class="form-control"
            required>

            <option value="">
                -- Pilih Produk --
            </option>

            <?php foreach($produk as $p): ?>

            <option value="<?= $p['id'] ?>">
                <?= $p['nama_produk'] ?>
            </option>

            <?php endforeach ?>

        </select>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Jumlah
        </label>

        <input
            type="number"
            name="jumlah"
            class="form-control"
            required>

    </div>

    <button
        type="submit"
        class="btn btn-success">
        Simpan
    </button>

</form>

</div>

<?= $this->include('layout/footer') ?>