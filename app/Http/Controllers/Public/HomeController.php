<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\JadwalTurne;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ambil 6 berita terbaru
        $beritas = Berita::orderBy('created_at', 'desc')
            ->take(6)
            ->get(['id', 'judul', 'penulis', 'foto', 'isi', 'created_at']);

        // ambil jadwal turne bulan ini, eager‐load romo & stasi
        $jadwalTurnes = JadwalTurne::with(['romo', 'stasi'])
            ->whereMonth('tanggal', now()->month)
            ->orderBy('tanggal')
            ->get();

        return Inertia::render('Public/Home', [
            'beritas' => $beritas,
            'jadwalTurnes' => $jadwalTurnes,
        ]);
    }
}
