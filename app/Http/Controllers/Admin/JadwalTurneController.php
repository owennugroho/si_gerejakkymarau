<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalTurne;
use App\Models\Romo;
use App\Models\Romos;
use App\Models\Stasi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JadwalTurneController extends Controller
{
    public function index()
    {
        $jadwalTurnes = JadwalTurne::with(['romo','stasi'])
            ->orderBy('tanggal')
            ->get();

        return Inertia::render('Admin/JadwalTurne/Index', [
            'jadwalTurnes' => $jadwalTurnes,
        ]);
    }

    public function create()
    {
        $romos  = Romos::all();
        $stasis = Stasi::all();

        return Inertia::render('Admin/JadwalTurne/Create', [
            'romos'  => $romos,
            'stasis' => $stasis,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'stasi_id'   => 'required|exists:stasis,id',
            'tanggal'    => 'required|date',
            'hari'       => 'required|string|max:255',
            'jam_mulai'  => 'required|date_format:H:i',
            'romo_id'    => 'required|exists:romos,id',
            'deskripsi'  => 'nullable|string',
        ]);

        JadwalTurne::create($data);
        return redirect()->route('admin.jadwal-turne.index');
    }

    public function edit(JadwalTurne $jadwalTurne)
    {
        $romos  = Romo::all();
        $stasis = Stasi::all();

        return Inertia::render('Admin/JadwalTurne/Edit', [
            'jadwalTurne' => $jadwalTurne->load(['romo','stasi']),
            'romos'       => $romos,
            'stasis'      => $stasis,
        ]);
    }

    public function update(Request $request, JadwalTurne $jadwalTurne)
    {
        $data = $request->validate([
            'stasi_id'   => 'required|exists:stasis,id',
            'tanggal'    => 'required|date',
            'hari'       => 'required|string|max:255',
            'jam_mulai'  => 'required|date_format:H:i',
            'romo_id'    => 'required|exists:romos,id',
            'deskripsi'  => 'nullable|string',
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