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

// Produk (public)
$routes->get('/produk', 'Produk::index');
$routes->get('/produk/kategori/(:any)', 'Produk::kategori/$1');
$routes->get('/produk/brand/(:any)', 'Produk::brand/$1');
$routes->get('/produk/(:any)', 'Produk::detail/$1');

// Review (perlu login)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->post('/review/simpan', 'Review::simpan');
    $routes->post('/review/balas/(:num)', 'Review::balas/$1');
});

// Keranjang (perlu login)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/keranjang', 'Keranjang::index');
    $routes->post('/keranjang/tambah', 'Keranjang::tambah');
    $routes->post('/keranjang/update/(:num)', 'Keranjang::update/$1');
    $routes->get('/keranjang/hapus/(:num)', 'Keranjang::hapus/$1');

    // Checkout
    $routes->get('/checkout', 'Checkout::index');
    $routes->post('/checkout/process', 'Checkout::process');

    // Profile
    $routes->get('/profile', 'Profile::index');
    $routes->post('/profile/update', 'Profile::update');

    // Address
    $routes->get('/address', 'Address::index');
    $routes->post('/address/simpan', 'Address::simpan');
    $routes->post('/address/update/(:num)', 'Address::update/$1');
    $routes->get('/address/hapus/(:num)', 'Address::hapus/$1');
    $routes->get('/address/set-default/(:num)', 'Address::setDefault/$1');

    // Orders
    $routes->get('/orders', 'Orders::index');
    $routes->get('/orders/(:num)', 'Orders::detail/$1');
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

    // Variant
    $routes->get('/produk/variant/(:num)', 'Admin\Variant::index/$1');
    $routes->post('/produk/variant/simpan/(:num)', 'Admin\Variant::simpan/$1');
});
