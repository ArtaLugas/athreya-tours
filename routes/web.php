<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutUsUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ContactAdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserProfileController;

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

    Route::get('/kontak-kami', [ContactController::class, 'index'])->name('kontakkami');
    Route::post('/store-kontak-kami', [ContactController::class, 'StoreKontakKami'])->name('storekontakkami');
});



Route::get('/dashboard', function () {
    return view('user.homepage');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(UserProfileController::class)->group(function () {
        Route::get('/athreya-tours/profil', 'index')->name('profiluser');
        Route::post('/athreya-tours/update-profil/{id}', 'UpdateProfilUser')->name('updateprofiluser');
    });
});
