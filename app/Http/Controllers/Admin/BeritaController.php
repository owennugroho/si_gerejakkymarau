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
        $items = Berita::all();
        return Inertia::render('Admin/Berita/Index', [
            'beritas' => $items,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Berita/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kutipan' => 'nullable|string',
            'foto'    => 'nullable|image|max:2048',  // if you plan on uploading images
            'isi'     => 'required|string',
        ]);

        // if you're handling uploads:
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index');
    }

    public function show(Berita $berita)
    {
        return Inertia::render('Admin/Berita/Show', [
            'berita' => $berita,
        ]);
    }

    public function edit(Berita $berita)
    {
        return Inertia::render('Admin/Berita/Edit', [
            'berita' => $berita,
        ]);
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kutipan' => 'nullable|string',
            'foto'    => 'nullable|image|max:2048',
            'isi'     => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('admin.berita.index');
    }
}
