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
        return Inertia::render('Admin/Donasi/Index', [
            'donasis' => $donasis,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Donasi/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'atas_nama' => 'required|string|max:255',
            'qris_image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        // Jika ada file qris_image, simpan ke disk 'public' dan ambil path-nya
        if ($request->hasFile('qris_image')) {
            $data['qris_image'] = $request
                ->file('qris_image')
                ->store('donasi/qris', 'public');
        }

        Donasi::create($data);

        return redirect()->route('admin.donasi.index');
    }

    public function show(Donasi $donasi)
    {
        return Inertia::render('Admin/Donasi/Show', [
            'donasi' => $donasi,
        ]);
    }

    public function edit(Donasi $donasi)
    {

        return Inertia::render('Admin/Donasi/Edit', [
            'donasi' => $donasi,
        ]);
    }

    public function update(Request $request, Donasi $donasi)
    {
        $data = $request->all();

        $validated = validator($data, [
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'atas_nama' => 'required|string|max:255',
            'qris_image' => 'nullable|image|mimes:jpg,png,jpeg,svg|max:2048',
            'keterangan' => 'nullable|string',
        ])->validate();

        if ($request->hasFile('qris_image')) {
            if ($donasi->qris_image) {
                \Storage::disk('public')->delete($donasi->qris_image);
            }

            $validated['qris_image'] = $request
                ->file('qris_image')
                ->store('donasi/qris', 'public');
        }

        $donasi->update($validated);

        return redirect()->route('admin.donasi.index');
    }

    public function destroy(Donasi $donasi)
    {
        $donasi->delete();

        return redirect()->route('admin.donasi.index');
    }
}
