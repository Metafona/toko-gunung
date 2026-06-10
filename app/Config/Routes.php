<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Home
$routes->get('/', 'Home::index');

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginProcess');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerProcess');
$routes->get('/logout', 'Auth::logout');

// Produk
$routes->get('/produk', 'Produk::index');
$routes->get('/produk/kategori/(:any)', 'Produk::kategori/$1');
$routes->get('/produk/brand/(:any)', 'Produk::brand/$1');
$routes->get('/produk/(:any)', 'Produk::detail/$1');

// Keranjang (perlu login)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/keranjang', 'Keranjang::index');
    $routes->post('/keranjang/tambah', 'Keranjang::tambah');
    $routes->post('/keranjang/update/(:num)', 'Keranjang::update/$1');
    $routes->get('/keranjang/hapus/(:num)', 'Keranjang::hapus/$1');

    // Checkout
    $routes->get('/checkout', 'Checkout::index');
    $routes->post('/checkout/process', 'Checkout::process');
});

// Admin (perlu login)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('/dashboard', 'Admin\Dashboard::index');

    $routes->get('/produk', 'Admin\Produk::index');
    $routes->get('/produk/tambah', 'Admin\Produk::tambah');
    $routes->post('/produk/simpan', 'Admin\Produk::simpan');
    $routes->get('/produk/edit/(:num)', 'Admin\Produk::edit/$1');
    $routes->post('/produk/update/(:num)', 'Admin\Produk::update/$1');
    $routes->get('/produk/hapus/(:num)', 'Admin\Produk::hapus/$1');
});
