<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Romos;
use Illuminate\Http\Request;
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
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|string',
            'isi' => 'nullable|string',
        ]);

        $romo->update($request->all());

        return redirect()->route('romos.index');
    }

    public function destroy(Romos $romo)
    {
        $romo->delete();

        return redirect()->route('romos.index');
    }
}
