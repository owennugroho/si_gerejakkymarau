<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalTurne;
use App\Models\Romos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JadwalTurneController extends Controller
{
    public function index()
    {
        // eager-load relasi 'romo'
        $jadwalTurnes = JadwalTurne::with('romo')->get();

        return Inertia::render('Admin/JadwalTurne/Index', [
            'jadwalTurnes' => $jadwalTurnes,
        ]);
    }

    public function create()
    {
        // data untuk dropdown romo
        $romos = Romos::all();

        return Inertia::render('Admin/JadwalTurne/Create', [
            'romos' => $romos,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lokasi'    => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'hari'      => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'romo_id'   => 'required|exists:romos,id',
            'deskripsi' => 'nullable|string',
        ]);

        JadwalTurne::create($data);

        return redirect()->route('admin.jadwal-turne.index');
    }

    public function show(JadwalTurne $jadwalTurne)
    {
        $jadwalTurne->load('romo');

        return Inertia::render('Admin/JadwalTurne/Show', [
            'jadwalTurne' => $jadwalTurne,
        ]);
    }

    public function edit(JadwalTurne $jadwalTurne)
    {
        $romos = Romos::all();

        return Inertia::render('Admin/JadwalTurne/Edit', [
            'jadwalTurne' => $jadwalTurne,
            'romos'       => $romos,
        ]);
    }

    public function update(Request $request, JadwalTurne $jadwalTurne)
    {
        $data = $request->validate([
            'lokasi'    => 'required|string|max:255',
            'tanggal'   => 'required|date',
            'hari'      => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'romo_id'   => 'required|exists:romos,id',
            'deskripsi' => 'nullable|string',
        ]);

        $jadwalTurne->update($data);

        return redirect()->route('admin.jadwal-turne.index');
    }

    public function destroy(JadwalTurne $jadwalTurne)
    {
        $jadwalTurne->delete();

        return redirect()->route('admin.jadwal-turne.index');
    }
}
