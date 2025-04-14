<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stasi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StasiController extends Controller
{
    public function index()
    {
        $stasis = Stasi::all();
        return Inertia::render('Admin/Stasis/Index', [
            'stasis' => $stasis,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Stasis/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_stasi'      => 'required|string|max:255',
            'desa'            => 'nullable|string|max:255',
            'alamat'          => 'nullable|string',
            'deskripsi'       => 'nullable|string',
            'umat_laki'       => 'required|integer|min:0',
            'umat_perempuan'  => 'required|integer|min:0',
            'foto_gereja'     => 'nullable|string',
            'foto_tanah'      => 'nullable|string',
        ]);

        Stasi::create($request->all());

        return redirect()->route('stasis.index');
    }

    public function show(Stasi $stasi)
    {
        return Inertia::render('Admin/Stasis/Show', [
            'stasi' => $stasi,
        ]);
    }

    public function edit(Stasi $stasi)
    {
        return Inertia::render('Admin/Stasis/Edit', [
            'stasi' => $stasi,
        ]);
    }

    public function update(Request $request, Stasi $stasi)
    {
        $request->validate([
            'nama_stasi'      => 'required|string|max:255',
            'desa'            => 'nullable|string|max:255',
            'alamat'          => 'nullable|string',
            'deskripsi'       => 'nullable|string',
            'umat_laki'       => 'required|integer|min:0',
            'umat_perempuan'  => 'required|integer|min:0',
            'foto_gereja'     => 'nullable|string',
            'foto_tanah'      => 'nullable|string',
        ]);

        $stasi->update($request->all());

        return redirect()->route('stasis.index');
    }

    public function destroy(Stasi $stasi)
    {
        $stasi->delete();

        return redirect()->route('stasis.index');
    }
}
