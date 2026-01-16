<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\KontakController;
use App\Http\Controllers\Admin\DashboardController;


// ── Public Pages ────────────────────────────────────────────────────────

// Home (landing page kosong dulu)
Route::get('/', [\App\Http\Controllers\Public\HomeController::class, 'index'])
     ->name('home');

// Berita (list + detail)
Route::get('/berita', [\App\Http\Controllers\Public\BeritaController::class, 'index'])
     ->name('berita.index');
Route::get('/berita/{id}', [\App\Http\Controllers\Public\BeritaController::class, 'show'])
     ->name('berita.show');

// Donasi
Route::get('/donasi', [\App\Http\Controllers\Public\DonasiController::class, 'index'])
     ->name('donasi.index');

// Info
Route::get('/info', [\App\Http\Controllers\Public\InfoController::class, 'index'])
     ->name('info.index');

// Jadwal Turne
Route::get('/jadwal-turne', [\App\Http\Controllers\Public\JadwalTurneController::class, 'index'])
     ->name('jadwal-turne.index');

// Foto Kegiatan (galeri)
Route::get('/foto-kegiatan', [\App\Http\Controllers\Public\KegiatanFotoController::class, 'index'])
     ->name('foto-kegiatan.index');
Route::get('/foto-kegiatan/{kegiatanFoto}', [\App\Http\Controllers\Public\KegiatanFotoController::class, 'show'])
     ->name('foto-kegiatan.show');

// Romos
Route::get('/romos', [\App\Http\Controllers\Public\RomosController::class, 'index'])
     ->name('romos.index');
Route::get('/romos/{romos}', [\App\Http\Controllers\Public\RomosController::class, 'show'])
     ->name('romos.show');

// Sejarah Gereja
Route::get('/sejarah-gereja', [\App\Http\Controllers\Public\SejarahGerejaController::class, 'index'])
     ->name('sejarah-gereja.index');

// Stasi (list + detail)
Route::get('/stasi', [\App\Http\Controllers\Public\StasiController::class, 'index'])
     ->name('stasi.index');
Route::get('/stasi/{stasi}', [\App\Http\Controllers\Public\StasiController::class, 'show'])
     ->name('stasi.show');

// Visi & Misi
Route::get('/visimisi', [\App\Http\Controllers\Public\VisimisiController::class, 'index'])
     ->name('visimisi.index');

// Kontak (Create + Store)
Route::get('/kontak', [KontakController::class, 'create'])
     ->name('kontak.create');
Route::post('/kontak', [KontakController::class, 'store'])
     ->name('kontak.store');


// ── Admin (backend) ────────────────────────────────────────────────────
Route::middleware(['auth', 'verified'])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {

          // Dashboard
          Route::get('dashboard', [DashboardController::class, 'index'])
               ->name('dashboard');

          // Profile
          Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
          Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
          Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

          // Resource CRUD
          Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class)->parameters(['berita' => 'berita']);
          Route::resource('jadwal-turne', \App\Http\Controllers\Admin\JadwalTurneController::class);
          Route::resource('stasi', \App\Http\Controllers\Admin\StasiController::class);
          Route::resource('visimisi', \App\Http\Controllers\Admin\VisimisiController::class);
          Route::resource('info', \App\Http\Controllers\Admin\InfoController::class);
          Route::resource('romos', \App\Http\Controllers\Admin\RomosController::class);
          Route::resource('donasi', \App\Http\Controllers\Admin\DonasiController::class);
          Route::resource('kegiatan-foto', \App\Http\Controllers\Admin\KegiatanFotoController::class);
          Route::resource('sejarah-gereja', \App\Http\Controllers\Admin\SejarahGerejaController::class);

          Route::get('/kontak', [\App\Http\Controllers\Admin\KontakController::class, 'index'])
               ->name('kontak.index');
          Route::get('/kontak/{kontak}', [\App\Http\Controllers\Admin\KontakController::class, 'show'])
               ->name('kontak.show');
          Route::delete('/kontak/{kontak}', [\App\Http\Controllers\Admin\KontakController::class, 'destroy'])
               ->name('kontak.destroy');
          Route::put('admin/kontak/{kontak}/read', [App\Http\Controllers\Admin\KontakController::class, 'toggleRead'])
               ->name('admin.kontak.toggleRead');
     });

require __DIR__ . '/auth.php';
