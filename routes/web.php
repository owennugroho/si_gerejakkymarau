<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProfileController;

// Halaman Publik
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin'      => Route::has('login'),
        'canRegister'   => Route::has('register'),
        'laravelVersion'=> Application::VERSION,
        'phpVersion'    => PHP_VERSION,
    ]);
})->name('home');

// Halaman Admin (Backend)
// Menggunakan middleware auth dan verified serta prefix "admin"
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource Routes untuk CRUD masing-masing entitas
    Route::resource('beritas', \App\Http\Controllers\Admin\BeritaController::class);
    Route::resource('jadwal-turnes', \App\Http\Controllers\Admin\JadwalTurneController::class);
    Route::resource('stasis', \App\Http\Controllers\Admin\StasiController::class);
    Route::resource('visimisis', \App\Http\Controllers\Admin\VisimisiController::class);
    Route::resource('infos', \App\Http\Controllers\Admin\InfoController::class);
    Route::resource('romos', \App\Http\Controllers\Admin\RomosController::class);
    Route::resource('donasis', \App\Http\Controllers\Admin\DonasiController::class);
    Route::resource('kegiatan-fotos', \App\Http\Controllers\Admin\KegiatanFotoController::class);
});

require __DIR__.'/auth.php';
