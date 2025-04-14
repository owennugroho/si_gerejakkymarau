<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        return Inertia::render('Admin/Beritas/Index', [
            'beritas' => $beritas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Beritas/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input yang dibutuhkan
        $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255', // jika ingin menyimpan nama penulis
            'kutipan' => 'nullable|string',
            'foto'    => 'nullable|string', // Sesuaikan jika Anda menggunakan validasi file upload
            'isi'     => 'required|string',
        ]);

        // Buat data berita baru
        Berita::create($request->all());

        // Redirect ke halaman index berita
        return redirect()->route('beritas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        return Inertia::render('Admin/Beritas/Show', [
            'berita' => $berita,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return Inertia::render('Admin/Beritas/Edit', [
            'berita' => $berita,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'   => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kutipan' => 'nullable|string',
            'foto'    => 'nullable|string',
            'isi'     => 'required|string',
        ]);

        // Update data berita
        $berita->update($request->all());

        // Redirect ke halaman index
        return redirect()->route('beritas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();

        // Redirect kembali ke halaman index
        return redirect()->route('beritas.index');
    }
}
