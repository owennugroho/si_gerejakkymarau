<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanFoto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KegiatanFotoController extends Controller
{
    public function index()
    {
        $fotos = KegiatanFoto::all();
        return Inertia::render('Admin/KegiatanFotos/Index', [
            'fotos' => $fotos,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/KegiatanFotos/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'required|string',
        ]);

        KegiatanFoto::create($request->all());

        return redirect()->route('kegiatan-fotos.index');
    }

    public function show(KegiatanFoto $kegiatanFoto)
    {
        return Inertia::render('Admin/KegiatanFotos/Show', [
            'foto' => $kegiatanFoto,
        ]);
    }

    public function edit(KegiatanFoto $kegiatanFoto)
    {
        return Inertia::render('Admin/KegiatanFotos/Edit', [
            'foto' => $kegiatanFoto,
        ]);
    }

    public function update(Request $request, KegiatanFoto $kegiatanFoto)
    {
        $request->validate([
            'judul'     => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'required|string',
        ]);

        $kegiatanFoto->update($request->all());

        return redirect()->route('kegiatan-fotos.index');
    }

    public function destroy(KegiatanFoto $kegiatanFoto)
    {
        $kegiatanFoto->delete();

        return redirect()->route('kegiatan-fotos.index');
    }
}
