<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DonasiController extends Controller
{
    public function index()
    {
        $donasis = Donasi::all();
        return Inertia::render('Admin/Donasis/Index', [
            'donasis' => $donasis,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Donasis/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank'      => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'atas_nama'      => 'nullable|string|max:255',
            'qris_image'     => 'nullable|string',
            'keterangan'     => 'nullable|string',
        ]);

        Donasi::create($request->all());

        return redirect()->route('donasis.index');
    }

    public function show(Donasi $donasi)
    {
        return Inertia::render('Admin/Donasis/Show', [
            'donasi' => $donasi,
        ]);
    }

    public function edit(Donasi $donasi)
    {
        return Inertia::render('Admin/Donasis/Edit', [
            'donasi' => $donasi,
        ]);
    }

    public function update(Request $request, Donasi $donasi)
    {
        $request->validate([
            'nama_bank'      => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'atas_nama'      => 'nullable|string|max:255',
            'qris_image'     => 'nullable|string',
            'keterangan'     => 'nullable|string',
        ]);

        $donasi->update($request->all());

        return redirect()->route('donasis.index');
    }

    public function destroy(Donasi $donasi)
    {
        $donasi->delete();

        return redirect()->route('donasis.index');
    }
}
