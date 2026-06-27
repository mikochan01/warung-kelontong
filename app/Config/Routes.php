<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/produk', 'Produk::index', ['filter' => 'auth']);
$routes->get('/produk/tambah', 'Produk::tambah', ['filter' => 'auth']);
$routes->post('/produk/simpan', 'Produk::simpan', ['filter' => 'auth']);
$routes->get('/produk/edit/(:num)', 'Produk::edit/$1', ['filter' => 'auth']);
$routes->post('/produk/update/(:num)', 'Produk::update/$1', ['filter' => 'auth']);
$routes->get('/produk/hapus/(:num)', 'Produk::hapus/$1', ['filter' => 'auth']);
$routes->get('/produk/export', 'Produk::export', ['filter' => 'auth']);
$routes->get('/produk/import', 'Produk::importForm', ['filter' => 'auth']);
$routes->post('/produk/import', 'Produk::import', ['filter' => 'auth']);

$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');
$routes->get('/test', 'Test::index');

$routes->get('/kategori', 'Kategori::index', ['filter' => 'auth']);
$routes->get('/kategori/tambah', 'Kategori::tambah', ['filter' => 'auth']);
$routes->post('/kategori/simpan', 'Kategori::simpan', ['filter' => 'auth']);
$routes->get('/kategori/edit/(:num)', 'Kategori::edit/$1', ['filter' => 'auth']);
$routes->post('/kategori/update/(:num)', 'Kategori::update/$1', ['filter' => 'auth']);
$routes->get('/kategori/hapus/(:num)', 'Kategori::hapus/$1', ['filter' => 'auth']);

$routes->get('/barang-masuk', 'BarangMasuk::index', ['filter' => 'auth']);
$routes->get('/barang-masuk/tambah', 'BarangMasuk::tambah', ['filter' => 'auth']);
$routes->post('/barang-masuk/simpan', 'BarangMasuk::simpan', ['filter' => 'auth']);

$routes->get('/barang-keluar', 'BarangKeluar::index', ['filter' => 'auth']);
$routes->get('/barang-keluar/tambah', 'BarangKeluar::tambah', ['filter' => 'auth']);
$routes->post('/barang-keluar/simpan', 'BarangKeluar::simpan', ['filter' => 'auth']);

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);