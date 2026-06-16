<?= $this->include('layout/header') ?>

    <h2>Tambah Produk</h2>

    <form action="/produk/simpan" method="post">

        <div class="mb-3">

            <label>Nama Produk</label>

            <input
                type="text"
                name="nama_produk"
                class="form-control"
            >

        </div>

        <div class="mb-3">

            <label>Harga Beli</label>

            <input
                type="number"
                name="harga_beli"
                class="form-control"
            >

        </div>

        <div class="mb-3">

            <label>Harga Jual</label>

            <input
                type="number"
                name="harga_jual"
                class="form-control"
            >

        </div>

        <div class="mb-3">

            <label>Stok</label>

            <input
                type="number"
                name="stok"
                class="form-control"
            >

        </div>

        <button class="btn btn-success">
            Simpan
        </button>

        <a href="/produk"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>
<?= $this->include('layout/footer') ?>