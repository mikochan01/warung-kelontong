<?= $this->include('layout/header') ?>
   
<h2>Edit Produk</h2>

<form action="/produk/update/<?= $produk['id'] ?>" method="post">
    
    <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input
            type="text"
            name="nama_produk"
            value="<?= $produk['nama_produk'] ?>"
            class="form-control"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Harga Beli</label>
        <input
            type="number"
            name="harga_beli"
            value="<?= $produk['harga_beli'] ?>"
            class="form-control"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Harga Jual</label>
        <input
            type="number"
            name="harga_jual"
            value="<?= $produk['harga_jual'] ?>"
            class="form-control"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input
            type="number"
            name="stok"
            value="<?= $produk['stok'] ?>"
            class="form-control"
        >
    </div>

    <button type="submit" class="btn btn-warning">
        Update
    </button>

    <a href="/produk" class="btn btn-secondary">
        Kembali
    </a>

</form>
<?= $this->include('layout/footer') ?>