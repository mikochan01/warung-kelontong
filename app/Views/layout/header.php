<!DOCTYPE html>
<html>

<head>
    <title>Sistem Warung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <?php if(session()->get('logged_in')): ?>

            <a href="/dashboard"
               class="navbar-brand fw-bold">
                🛒 Sistem Warung
            </a>

            <div class="d-flex align-items-center gap-2">

                <a href="/produk"
                   class="btn btn-outline-light btn-sm">
                    Produk
                </a>

                <a href="/kategori"
                   class="btn btn-outline-light btn-sm">
                    Kategori
                </a>

                <a href="/barang-masuk"
                   class="btn btn-outline-light btn-sm">
                    Barang Masuk
                </a>

                <a href="/barang-keluar"
                   class="btn btn-outline-light btn-sm">
                    Barang Keluar
                </a>

                <a href="/logout"
                   class="btn btn-danger btn-sm">
                    Logout
                </a>

            </div>

        <?php else: ?>

            <span class="navbar-brand fw-bold">
                🛒 Sistem Warung
            </span>

        <?php endif; ?>

    </div>
</nav>

<div class="container mt-4">