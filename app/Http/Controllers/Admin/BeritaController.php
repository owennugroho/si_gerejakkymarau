<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return Inertia::render('Admin/Beritas/Index', [
            'beritas' => $beritas,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Beritas/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kutipan' => 'nullable|string',
            'foto'    => 'nullable|string',
            'isi'     => 'required|string',
        ]);

        Berita::create($request->all());

        return redirect()->route('beritas.index');
    }

    public function show(Berita $berita)
    {
        return Inertia::render('Admin/Beritas/Show', [
            'berita' => $berita,
        ]);
    }

    public function edit(Berita $berita)
    {
        return Inertia::render('Admin/Beritas/Edit', [
            'berita' => $berita,
        ]);
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kutipan' => 'nullable|string',
            'foto'    => 'nullable|string',
            'isi'     => 'required|string',
        ]);

        $berita->update($request->all());

        return redirect()->route('beritas.index');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('beritas.index');
    }
}
