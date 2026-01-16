<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanFoto;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class KegiatanFotoController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/KegiatanFoto/Index', [
            'kegiatanfotos' => KegiatanFoto::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/KegiatanFoto/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'required|image|max:4096',
        ]);

        $data['foto'] = $request->file('foto')->store('kegiatanfoto', 'public');

        KegiatanFoto::create($data);

        return redirect()->route('admin.kegiatan-foto.index');
    }

    // 🔥 PENTING: harus $kegiatan_foto (sesuai {kegiatan_foto} di route)
    public function show(KegiatanFoto $kegiatan_foto)
    {
        return Inertia::render('Admin/KegiatanFoto/Show', [
            'kegiatanfoto' => $kegiatan_foto,
        ]);
    }

    public function edit(KegiatanFoto $kegiatan_foto)
    {
        return Inertia::render('Admin/KegiatanFoto/Edit', [
            'kegiatanfoto' => $kegiatan_foto,
        ]);
    }

    public function update(Request $request, KegiatanFoto $kegiatan_foto)
    {
        $data = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto'      => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('foto')) {
            // hapus foto lama jika ada
            if ($kegiatan_foto->foto) {
                Storage::disk('public')->delete($kegiatan_foto->foto);
            }

            // simpan foto baru
            $data['foto'] = $request->file('foto')->store('kegiatanfoto', 'public');
        }

        $kegiatan_foto->update($data);

        return redirect()->route('admin.kegiatan-foto.index');
    }

    public function destroy(KegiatanFoto $kegiatan_foto)
    {
        if ($kegiatan_foto->foto) {
            Storage::disk('public')->delete($kegiatan_foto->foto);
        }

        $kegiatan_foto->delete();

        return redirect()->route('admin.kegiatan-foto.index');
    }
}
