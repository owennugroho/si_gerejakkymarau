<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JadwalTurne;
use Inertia\Inertia;

class JadwalTurneController extends Controller
{
    public function index()
    {
        // ambil semua jadwal, terbaru dulu
        $jadwal = JadwalTurne::with('romo')
                   ->orderBy('tanggal','asc')
                   ->get();

        return Inertia::render('Public/JadwalTurne/Index', [
            'jadwals' => $jadwal,
        ]);
    }

    public function show(JadwalTurne $jadwalTurne)
    {
        $jadwalTurne->load('romo'); // pastikan relasi romo ada
        return Inertia::render('Public/JadwalTurne/Show', [
            'jadwal' => $jadwalTurne,
        ]);
    }
}
