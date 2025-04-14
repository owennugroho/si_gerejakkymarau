<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalTurne;
use App\Models\Romos; // Untuk mengambil data romos
use Illuminate\Http\Request;
use Inertia\Inertia;

class JadwalTurneController extends Controller
{
    public function index()
    {
        $jadwalTurnes = JadwalTurne::with('romos')->get();
        return Inertia::render('Admin/JadwalTurnes/Index', [
            'jadwalTurnes' => $jadwalTurnes,
        ]);
    }

    public function create()
    {
        $romos = Romos::all(); // Ambil daftar romos untuk pilihan pada form
        return Inertia::render('Admin/JadwalTurnes/Create', [
            'romos' => $romos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lokasi'    => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'hari'      => 'required|string|max:255',
            'jam_mulai' => 'required',
            'romo_id'   => 'required|exists:romos,id',
            'deskripsi' => 'nullable|string',
        ]);

        JadwalTurne::create($request->all());

        return redirect()->route('jadwal-turnes.index');
    }

    public function show(JadwalTurne $jadwalTurne)
    {
        $jadwalTurne->load('romos');
        return Inertia::render('Admin/JadwalTurnes/Show', [
            'jadwalTurne' => $jadwalTurne,
        ]);
    }

    public function edit(JadwalTurne $jadwalTurne)
    {
        $romos = Romos::all();
        return Inertia::render('Admin/JadwalTurnes/Edit', [
            'jadwalTurne' => $jadwalTurne,
            'romos'       => $romos,
        ]);
    }

    public function update(Request $request, JadwalTurne $jadwalTurne)
    {
        $request->validate([
            'lokasi'    => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'hari'      => 'required|string|max:255',
            'jam_mulai' => 'required',
            'romo_id'   => 'required|exists:romos,id',
            'deskripsi' => 'nullable|string',
        ]);

        $jadwalTurne->update($request->all());

        return redirect()->route('jadwal-turnes.index');
    }

    public function destroy(JadwalTurne $jadwalTurne)
    {
        $jadwalTurne->delete();

        return redirect()->route('jadwal-turnes.index');
    }
}
