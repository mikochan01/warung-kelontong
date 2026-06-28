<?= $this->include('layout/header') ?>

<?php $validation = session('validation'); ?>

<div class="container mt-4">

<h2>Tambah Barang Keluar</h2>

<form action="/barang-keluar/simpan" method="post">

    <div class="mb-3">

        <label class="form-label">
            Produk
        </label>

        <select
            name="produk_id" 
            id="produk"
            class="form-control <?= ($validation && $validation->hasError('produk_id')) ? 'is-invalid' : '' ?>"            
            required>

            <option value="">
                -- Pilih Produk --
            </option>

            <?php foreach($produk as $p): ?>

            <option 
                value="<?= $p['id'] ?>"
                data-stok="<?= $p['stok'] ?>"
                <?= old('produk_id') == $p['id'] ? 'selected' : '' ?>
            >
                <?= $p['nama_produk'] ?>
            </option>

            <?php endforeach ?>

        </select>

            <?php if ($validation && $validation->hasError('produk_id')): ?>
                <div class="invalid-feedback d-block">
                    <?= $validation->getError('produk_id') ?>
                </div>
            <?php endif; ?>

    </div>

    <div class="mb-3">

        <label class="form-label">
            Jumlah
        </label>

        <input
            type="number"
            name="jumlah"
            id="jumlah"
            value="<?= old('jumlah') ?>"
            class="form-control <?= ($validation && $validation->hasError('jumlah')) ? 'is-invalid' : '' ?>"
            >

            <?php if ($validation && $validation->hasError('jumlah')): ?>
                <div class="invalid-feedback d-block">
                    <?= $validation->getError('jumlah') ?>
                </div>
            <?php endif; ?>

        <div id="warning" class="text-danger mt-2"></div>

    </div>

    <button
        type="submit"
        id="btnSimpan"
        class="btn btn-success" disabled>
        Simpan
    </button>

</form>

<script>
    const produkSelect = document.getElementById('produk');
    const jumlahInput = document.getElementById('jumlah');
    const warning = document.getElementById('warning');
    const btnSimpan = document.getElementById('btnSimpan');

    function cekStok() {
    const selectedOption =
        produkSelect.options[produkSelect.selectedIndex];

    if (!selectedOption.dataset.stok) {
        warning.innerHTML = "";
        btnSimpan.disabled = true;
        return;
    }

    const stok = parseInt(selectedOption.dataset.stok);
    const jumlah = parseInt(jumlahInput.value || 0);

    if (jumlah <= 0) {
        warning.innerHTML = "";
        btnSimpan.disabled = true;
        return;
    }

    if (jumlah > stok) {
        warning.innerHTML =
            "Stok tidak mencukupi! Stok tersedia: " + stok;

        btnSimpan.disabled = true;
    } else {
        warning.innerHTML = "";
        btnSimpan.disabled = false;
    }
}

            produkSelect.addEventListener('change', cekStok);
            jumlahInput.addEventListener('input', cekStok);
</script>

</div>

<?= $this->include('layout/footer') ?>