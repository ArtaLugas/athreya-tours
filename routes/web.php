<?php

use App\Models\Pesanan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\AboutUsUserController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminPesananController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ContactAdminController;
use App\Http\Controllers\PaketWisataUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');

    Route::get('/tentang-kami', [AboutUsUserController::class, 'index'])->name('aboutususer');

    Route::controller(ContactController::class)->group(function () {
        Route::get('/kontak-kami', [ContactController::class, 'index'])->name('kontakkami');
        Route::post('/store-kontak-kami', [ContactController::class, 'StoreKontakKami'])->name('storekontakkami');
    });

    Route::controller(PaketWisataUserController::class)->group(function () {
        Route::get('/paket-wisata', [PaketWisataUserController::class, 'index'])->name('paketwisata');
        Route::post('/paket-wisata/sort', 'SortPaketWisata')->name('sortpaketwisata');
    });
});


Route::middleware(['auth'])->group(function () {
    Route::controller(HomepageController::class)->group(function () {
        Route::get('/dashboard', [HomepageController::class, 'index'])->name('dashboard');
    });

    Route::controller(PaketWisataUserController::class)->group(function () {
        Route::get('/paket-wisata/detail/{id}', 'ShowDetail')->name('detailpaketwisata');
        Route::post('/pemesanan', 'StorePemesanan')->name('storepemesanan');
    });
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admindashboard');

    Route::controller(PaketWisataController::class)->group(function () {
        Route::get('/admin/tambah-paket-wisata', 'TambahPaketWisata')->name('tambahpaketwisata');
        Route::get('/admin/list-paket-wisata', 'ListPaketWisata')->name('listpaketwisata');
        Route::post('/admin/store-paket-wisata', 'StorePaketWisata')->name('storepaketwisata');
        Route::get('/admin/edit-paket-wisata/{id}', 'EditPaketWisata')->name('editpaketwisata');
        Route::post('/admin/update-paket-wisata/{id}', 'UpdatePaketWisata')->name('updatepaketwisata');
        Route::delete('/admin/delete-paket-wisata/{id}', 'DeletePaketWisata')->name('deletepaketwisata');
    });

    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('/admin/profil', 'index')->name('lihatprofil');
        Route::post('/admin/update-profil/{id}', 'UpdateProfil')->name('updateprofil');
    });

    Route::controller(AboutUsController::class)->group(function () {
        Route::get('/admin/about-us', 'index')->name('aboutus');
        Route::post('/admin/store-tentang-kami', 'StoreTentangKami')->name('storetentangkami');
        Route::get('/admin/toggle-status/{id}', 'ToggleStatus')->name('togglestatus');
        Route::get('/admin/delete-about-us/{id}', 'DeleteAboutUs')->name('deleteaboutus');
    });

    Route::controller(ContactAdminController::class)->group(function () {
        Route::get('/admin/kontak/', 'index')->name('kontakuser');
        Route::get('/admin/show-kontak/{id}', 'ShowKontak')->name('showkontak');
        Route::get('/admin/balas-pesan/{id}', 'TampilBalasPesan')->name('tampilbalaspesan');
        Route::post('/admin/balas-pesan/{id}', 'KirimBalasPesan')->name('kirimbalaspesan');
        Route::get('/admin/delete/kontak/{id}', 'DeleteKontak')->name('deletekontak');
    });

    Route::controller(AdminPesananController::class)->group(function () {
        Route::get('/admin/pesanan', 'DaftarPesananUser')->name('daftarpesananuser');
        Route::post('/admin/pesanan/tolak/{id}', 'TolakPesanan')->name('tolakpesanan');
        Route::post('/admin/pesanan/terima/{id}', 'TerimaPesanan')->name('terimapesanan');
        Route::get('/admin/kirim-invoice/{orderId}', 'KirimInvoice')->name('kiriminvoice');
        Route::get('/admin/pesanan/delete/{id}', 'DeletePesanan')->name('deletepesanan');
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/athreya-tours/profil', 'index')->name('profiluser');
        Route::post('/athreya-tours/update-profil/{id}', 'UpdateProfilUser')->name('updateprofiluser');
    });

    Route::get('/athreya-tours/riwayat-pesanan/', [HomepageController::class, 'RiwayatPesanan'])->name('riwayatpesanan');
});
