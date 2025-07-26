<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JadwalTurne;
use Inertia\Inertia;

class JadwalTurneController extends Controller
{
    public function index()
    {
        $jadwals = JadwalTurne::with(['romo','stasi'])
                     ->orderBy('tanggal','asc')
                     ->get();

        return Inertia::render('Public/JadwalTurne/Index', [
            'jadwals' => $jadwals,
        ]);
    }

    public function show(JadwalTurne $jadwalTurne)
    {
        return Inertia::render('Public/JadwalTurne/Show', [
            'jadwal' => $jadwalTurne->load(['romo','stasi']),
        ]);
    }
}