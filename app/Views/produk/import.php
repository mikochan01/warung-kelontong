<?= $this->include('layout/header') ?>

<h2>Import Produk Excel</h2>

<form action="/produk/import"
      method="post"
      enctype="multipart/form-data">

    <div class="mb-3">
        <input
            type="file"
            name="file_excel"
            class="form-control"
            required>
    </div>

    <button class="btn btn-primary">
        Upload
    </button>

</form>

<?= $this->include('layout/footer') ?>