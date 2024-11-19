<?php

use Illuminate\Support\Facades\Route;

// Kontroler
use App\Http\Controllers\UserController;
use App\Http\Controllers\WasteManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EconomicBenefitController;

// Middleware
use App\Http\Middleware\isLogin;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isGuest;

// untuk halaman landing
Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');

// untuk pengguna tamu (belum login)
Route::middleware([isGuest::class])->group(function () {
    // Halaman login
    Route::get('/login', [UserController::class, 'showlogin'])->name('login');
    // Proses login
    Route::post('/login', [UserController::class, 'login'])->name('login.store');
    // Halaman register
    Route::get('/register', [UserController::class, 'showregister'])->name('register');
    // Proses register
    Route::post('/register', [UserController::class, 'register_store'])->name('register.store');
});

// untuk pengguna yang sudah login
Route::middleware([isLogin::class])->group(function () {
    // Proses logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    // Halaman utama setelah login
    Route::get('/home', [UserController::class, 'showhome'])->name('home');

    // untuk manajemen sampah
    Route::get('/manage/{userId?}', [WasteManagementController::class, 'index'])->name('waste.show');
    Route::post('/manage', [WasteManagementController::class, 'store'])->name('waste.store');
    Route::delete('/manage/{id}', [WasteManagementController::class, 'destroy'])->name('waste.delete');

    // Untuk settings pengguna
    Route::get('/settings', [UserController::class, 'showsettings'])->name('settings');
    // untuk profil pengguna
    Route::get('/profile', [UserController::class, 'showprofile'])->name('profile');
    Route::post('/profile/update-picture', [ProfileController::class, 'updatePicture'])->name('profile.updatePicture');

    // Untuk Menukar Point
    Route::get('/exchange', [EconomicBenefitController::class, 'index'])->name('exchange');
    Route::post('/exchange', [EconomicBenefitController::class, 'store'])->name('exchange.store');
    
});

// untuk pengguna dengan role tertentu
Route::middleware([CheckRole::class])->group(function () {
    // Halaman untuk mengelola permintaan limbah
    Route::get('/manage-requests', [WasteManagementController::class, 'manageRequests'])->name('manage.requests');
    Route::put('/manage-requests/{id}', [WasteManagementController::class, 'updateRequest'])->name('update.requests');
    Route::put('/manage-requests/bulk-update', [WasteManagementController::class, 'bulkUpdate'])->name('bulk.update.requests');

});

// untuk admin
Route::middleware([isAdmin::class])->prefix('/admin')->group(function () {
    // Halaman utama admin
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // untuk mengedit akun admin
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/edit/{id}', [AdminController::class, 'update'])->name('admin.update');
    // untuk menambah akun admin
    Route::get('/add', [AdminController::class, 'add'])->name('admin.add');
    Route::post('/add', [AdminController::class, 'updet'])->name('admin.updet');
    // untuk menghapus akun admin
    Route::delete('/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
});
