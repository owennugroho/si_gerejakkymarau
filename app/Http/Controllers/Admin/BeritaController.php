<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Berita/Index', [
            'beritas' => Berita::latest()->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Berita/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'penulis'  => 'required|string|max:255',
            'kutipan'  => 'nullable|string',
            'foto'     => 'nullable|image|max:2048',
            'isi'      => 'required|string',
        ]);

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

    // ⚠️ WAJIB pakai model binding (JANGAN $id)
    public function edit(Berita $berita)
    {
        return Inertia::render('Admin/Berita/Edit', [
            'berita' => $berita,
        ]);
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'judul'    => 'required|string|max:255',
            'penulis'  => 'required|string|max:255',
            'kutipan'  => 'nullable|string',
            'foto'     => 'nullable|image|max:2048',
            'isi'      => 'required|string',
        ]);

        if ($request->hasFile('foto')) {

            // hapus foto lama
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }

            // simpan foto baru
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index');
    }

    public function destroy(Berita $berita)
    {
        // hapus foto dari storage
        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }

        // hapus data dari DB
        $berita->delete();

        return redirect()->route('admin.berita.index');
    }
}
