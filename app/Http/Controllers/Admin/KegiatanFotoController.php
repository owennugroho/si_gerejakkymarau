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
        $items = KegiatanFoto::all();
        return Inertia::render('Admin/KegiatanFoto/Index', [
            'kegiatanfotos' => $items,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/KegiatanFoto/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'      => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'foto'       => 'required|image|max:4096',
        ]);

        $data['foto'] = $request->file('foto')->store('kegiatanfoto', 'public');

        KegiatanFoto::create($data);

        // ganti route-nya ke kebab-case
        return redirect()->route('admin.kegiatan-foto.index');
    }

    public function show(KegiatanFoto $kegiatanfoto)
    {
        return Inertia::render('Admin/KegiatanFoto/Show', [
            'kegiatanfoto' => $kegiatanfoto,
        ]);
    }

    public function edit(KegiatanFoto $kegiatanfoto)
    {
        return Inertia::render('Admin/KegiatanFoto/Edit', [
            'kegiatanfoto' => $kegiatanfoto,
        ]);
    }

    public function update(Request $request, KegiatanFoto $kegiatanfoto)
    {
        $data = $request->validate([
            'judul'      => 'required|string|max:255',
            'deskripsi'  => 'nullable|string',
            'foto'       => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kegiatanfoto', 'public');
        }

        $kegiatanfoto->update($data);

        return redirect()->route('admin.kegiatan-foto.index');
    }

    public function destroy(KegiatanFoto $kegiatanfoto)
    {
        $kegiatanfoto->delete();
        return redirect()->route('admin.kegiatan-foto.index');
    }
}
