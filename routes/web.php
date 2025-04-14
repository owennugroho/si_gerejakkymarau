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
    Route::resource('beritas', \App\Http\Controllers\Admin\BeritaController::class)
        ->names('admin.beritas');
    Route::resource('jadwal-turnes', \App\Http\Controllers\Admin\JadwalTurneController::class)
        ->names('admin.jadwal-turnes');
    Route::resource('stasis', \App\Http\Controllers\Admin\StasiController::class)
        ->names('admin.stasis');
    Route::resource('visimisis', \App\Http\Controllers\Admin\VisimisiController::class)
        ->names('admin.visimisis');
    Route::resource('infos', \App\Http\Controllers\Admin\InfoController::class)
        ->names('admin.infos');
    Route::resource('romos', \App\Http\Controllers\Admin\RomosController::class)
        ->names('admin.romos');
    Route::resource('donasis', \App\Http\Controllers\Admin\DonasiController::class)
        ->names('admin.donasis');
    Route::resource('kegiatan-fotos', \App\Http\Controllers\Admin\KegiatanFotoController::class)
        ->names('admin.kegiatan-fotos');
    Route::resource('sejarahgerejas', \App\Http\Controllers\Admin\SejarahGerejaController::class)
        ->names('admin.sejarahgerejas');
});

require __DIR__ . '/auth.php';
