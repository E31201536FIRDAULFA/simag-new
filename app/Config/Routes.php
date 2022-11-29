<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('dashboard', ['filter' => 'authGuard'], function ($routes) {
    // Admin Routes
    $routes->group('admin', ['filter' => 'authGuardAdmin'], function ($routes) {
        // CRUD Pembimbing
        $routes->get('/', 'Admin::index');
        $routes->get('pembimbing', 'Admin::dataPembimbing');
        $routes->get('pembimbing/add', 'Admin::tambahPembimbing');
        $routes->post('pembimbing/insert', 'Admin::tambahPembimbing');
        $routes->get('pembimbing/edit/(:num)', 'Admin::editPembimbing/$1');
        $routes->post('pembimbing/update/(:num)', 'Admin::editPembimbing/$1');
        $routes->get('pembimbing/delete/(:num)', 'Admin::hapusPembimbing/$1');
        // CRUD Peserta
        $routes->get('peserta', 'Admin::dataPeserta');
        $routes->get('peserta/terima/(:num)', 'Admin::terimaPeserta/$1');
        $routes->get('peserta/delete/(:num)', 'Admin::hapusPeserta/$1');
        $routes->get('peserta/detail/(:num)', 'Admin::detailPeserta/$1');
        // Absen
        $routes->get('data/absen', 'Admin::dataAbsen');
        $routes->get('data/absen/detail/(:num)', 'Admin::detailAbsen/$1');
        $routes->get('data/absen/koordinat/(:num)', 'Admin::getAbsenKoordinat/$1');
        // Lainnya
        $routes->get('data/aktivitas', 'Admin::dataAktivitas');
        $routes->get('data/proposal/(:num)', 'Admin::bukaProposal/$1');
        $routes->get('data/pengantar/(:num)', 'Admin::bukaPengantar/$1');
    });

    // Pembimbing Routes
    $routes->group('pembimbing', ['filter' => 'authGuardPembimbing'], function ($routes) {
        $routes->get('/', 'Pembimbing::index');
        //File
        $routes->get('data/proposal/(:num)', 'Pembimbing::bukaProposal/$1');
        $routes->get('data/pengantar/(:num)', 'Pembimbing::bukaPengantar/$1');
        //Peserta
        $routes->get('data/peserta', 'Pembimbing::dataPeserta');
        $routes->get('data/peserta/detail/(:num)', 'Pembimbing::detailPeserta/$1');
        $routes->get('data/peserta/terima/(:num)', 'Pembimbing::terimaPeserta/$1');
        $routes->get('data/peserta/delete/(:num)', 'Pembimbing::hapusPeserta/$1');
        $routes->match(['get', 'post'], 'data/peserta/pesan/(:num)', 'Pembimbing::pesan/$1');
        //Aktivitas
        $routes->get('data/aktivitas', 'Pembimbing::dataAktivitas');
        $routes->get('data/aktivitas/terima/(:num)', 'Pembimbing::terimaAktivitas/$1');
        $routes->get('data/aktivitas/delete/(:num)', 'Pembimbing::hapusAktivitas/$2');
        //Lainnya
        $routes->get('data/pengajuan', 'Pembimbing::dataPengajuan');
        $routes->get('data/absen', 'Pembimbing::dataAbsen');
        $routes->get('data/absen/detail/(:num)', 'Pembimbing::detailAbsen/$1');
        $routes->get('data/report/(:num)', 'Pembimbing::report/$1');
        $routes->get('data/nilai', 'Pembimbing::dashboard');
        $routes->add('data/nilai/(:num)', 'Pembimbing::nilai/$1');
        $routes->get('data/nilai/cetak/(:any)/(:num)', 'Pembimbing::cetakPDF/$1/$2');
        //Divisi
        $routes->get('data/divisi', 'DivisiController::index');
        $routes->match(['get', 'post'], 'data/divisi/tambah', 'DivisiController::insert');
        $routes->match(['get', 'post'], 'data/divisi/update/(:num)', 'DivisiController::update/$1');
        $routes->get('data/divisi/delete/(:num)', 'DivisiController::delete/$1');
        $routes->match(['get', 'post'], 'data/peserta/assign/divisi/(:num)', 'DivisiController::setDivisi/$1');
    });
    // Notif Routes
    $routes->group('notif', ['filter' => 'authGuardNotif'], function ($routes) {
        $routes->get('/', 'Notif::index');
        $routes->get('pengajuan/(:num)', 'Notif::ajukan/$1');
        $routes->post('pengajuan/proses', 'Notif::prosesAjukan');
        $routes->get('pengajuan/detail/(:num)', 'Notif::dataPengajuan/$1');
        $routes->get('pesan/(:num)', 'Notif::pesanAdmin/$1');
    });
    // Peserta Routes
    $routes->group('peserta', ['filter' => 'authGuardPeserta'], function ($routes) {
        $routes->get('/', 'Peserta::index');
        $routes->get('kehadiran', 'Peserta::getKehadiran');
        $routes->post('tambah/lokasi', 'Peserta::addLokasi');
        $routes->post('tambah/absen', 'Peserta::addAbsen');
        $routes->get('data/absen', 'Peserta::dataAbsen');
        $routes->get('data/aktivitas/(:num)', 'Peserta::dataAktivitas/$1');
        $routes->add('data/aktivitas/tambah/(:num)', 'Peserta::tambahAktivitas/$1');
        $routes->match(['get', 'post'], 'data/aktivitas/update/(:num)', 'Peserta::editAktivitas/$1');
        $routes->get('data/aktivitas/delete/(:num)/(:num)', 'Peserta::hapusAktivitas/$1/$2');
        $routes->match(['get', 'post'], 'profile/(:num)', 'Peserta::Profil/$1');
        $routes->get('ajukan', 'Notif::ajukan');
        $routes->post('ajukan/proses', 'Notif::prosesAjukan/');
    });
});

// AUTH Routes
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('login', 'AuthGoogle::index');
$routes->get('logout', 'AuthGoogle::logout');
$routes->match(['get', 'post'],'registrasi', 'Registrasi::index');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
