<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;

// Halaman Publik
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

// Halaman Admin (Backend)
// Semua rute admin di bawah prefix "admin" dan dilindungi middleware auth dan verified.
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    // Profile Management untuk Admin
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('admin.profile.destroy');

    // Resource Routes untuk CRUD masing-masing entitas
    Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class)
        ->names('admin.berita');
    Route::resource('jadwal-turne', \App\Http\Controllers\Admin\JadwalTurneController::class)
        ->names('admin.jadwal-turne');
    Route::resource('stasi', \App\Http\Controllers\Admin\StasiController::class)
        ->names('admin.stasi');
    Route::resource('visimisi', \App\Http\Controllers\Admin\VisimisiController::class)
        ->names('admin.visimisi');
    Route::resource('info', \App\Http\Controllers\Admin\InfoController::class)
        ->names('admin.info');
    Route::resource('romos', \App\Http\Controllers\Admin\RomosController::class)
        ->names('admin.romos');
    Route::resource('donasi', \App\Http\Controllers\Admin\DonasiController::class)
        ->names('admin.donasi');
    Route::resource('kegiatan-foto', \App\Http\Controllers\Admin\KegiatanFotoController::class)
        ->names('admin.kegiatan-foto');
    Route::resource('sejarah-gereja', \App\Http\Controllers\Admin\SejarahGerejaController::class)
        ->names('admin.sejarah-gereja');
});

require __DIR__ . '/auth.php';
