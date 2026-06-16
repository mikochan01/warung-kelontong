<?= $this->include('layout/header') ?>

<div class="container mt-4">

    <h2>Edit Kategori</h2>

    <form action="/kategori/update/<?= $kategori['id'] ?>" method="post">

        <div class="mb-3">

            <label class="form-label">
                Nama Kategori
            </label>

            <input
                type="text"
                name="nama_kategori"
                value="<?= $kategori['nama_kategori'] ?>"
                class="form-control"
                required
            >

        </div>

        <button
            type="submit"
            class="btn btn-warning">
            Update
        </button>

        <a href="/kategori"
           class="btn btn-secondary">
           Kembali
        </a>

    </form>

</div>

<?= $this->include('layout/footer') ?>