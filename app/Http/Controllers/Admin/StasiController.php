<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class StasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stasis = Stasi::all();

        return Inertia::render('Admin/Stasi/Index', [
            'stasis' => $stasis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Stasi/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_stasi' => 'required|string|max:255',
            'desa' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'umat_laki' => 'required|integer|min:0',
            'umat_perempuan' => 'required|integer|min:0',
            'foto_gereja' => 'nullable|image',
            'foto_tanah' => 'nullable|image',
        ]);

        // simpan file jika ada
        if ($request->hasFile('foto_gereja')) {
            $data['foto_gereja'] = $request->file('foto_gereja')
                ->store('stasi/foto_gereja', 'public');
        }
        if ($request->hasFile('foto_tanah')) {
            $data['foto_tanah'] = $request->file('foto_tanah')
                ->store('stasi/foto_tanah', 'public');
        }

        Stasi::create($data);

        return redirect()->route('admin.stasi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stasi $stasi)
    {
        return Inertia::render('Admin/Stasi/Show', [
            'stasi' => $stasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stasi $stasi)
    {
        return Inertia::render('Admin/Stasi/Edit', [
            'stasi' => $stasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stasi $stasi)
    {
        $data = $request->validate([
            'nama_stasi' => 'required|string|max:255',
            'desa' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'umat_laki' => 'required|integer|min:0',
            'umat_perempuan' => 'required|integer|min:0',
        ]);

        // FOTO GEREJA
        if ($request->hasFile('foto_gereja')) {
            if ($stasi->foto_gereja) {
                Storage::disk('public')->delete($stasi->foto_gereja);
            }

            $data['foto_gereja'] = $request->file('foto_gereja')
                ->store('stasi/foto_gereja', 'public');
        }

        // FOTO TANAH
        if ($request->hasFile('foto_tanah')) {
            if ($stasi->foto_tanah) {
                Storage::disk('public')->delete($stasi->foto_tanah);
            }

            $data['foto_tanah'] = $request->file('foto_tanah')
                ->store('stasi/foto_tanah', 'public');
        }

        $stasi->update($data);

        return redirect()->route('admin.stasi.index')
            ->with('success', 'Data stasi berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stasi $stasi)
    {
        // Hapus foto gereja jika ada
        if ($stasi->foto_gereja && Storage::disk('public')->exists($stasi->foto_gereja)) {
            Storage::disk('public')->delete($stasi->foto_gereja);
        }

        // Hapus foto tanah jika ada
        if ($stasi->foto_tanah && Storage::disk('public')->exists($stasi->foto_tanah)) {
            Storage::disk('public')->delete($stasi->foto_tanah);
        }

        $stasi->delete();

        return redirect()->route('admin.stasi.index');
    }
}
