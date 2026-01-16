<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Romos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RomosController extends Controller
{
    public function index()
    {
        $romos = Romos::all();
        return Inertia::render('Admin/Romos/Index', [
            'romos' => $romos,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Romos/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:255',
            'isi' => 'required',
            'foto' => 'required|image',
        ]);

        // simpan foto
        $data['foto'] = $request->file('foto')
            ->store('romos', 'public');

        Romos::create($data);

        // ← pastikan ini:
        return redirect()->route('admin.romos.index');
    }

    public function show(Romos $romo)
    {
        return Inertia::render('Admin/Romos/Show', [
            'romo' => $romo,
        ]);
    }

    public function edit(Romos $romo)
    {
        return Inertia::render('Admin/Romos/Edit', [
            'romo' => $romo,
        ]);
    }

    public function update(Request $request, Romos $romo)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'isi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // hapus foto lama
            if ($romo->foto) {
                Storage::disk('public')->delete($romo->foto);
            }

            // simpan foto baru
            $data['foto'] = $request->file('foto')->store('romos', 'public');
        }

        $romo->update($data);

        return redirect()->route('admin.romos.index')
            ->with('success', 'Romo berhasil diperbarui');
    }

    public function destroy(Romos $romo)
    {
        if ($romo->foto) {
            Storage::disk('public')->delete($romo->foto);
        }

        $romo->delete();

        return redirect()->route('admin.romos.index');
    }
}
