<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SejarahGereja;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SejarahGerejaController extends Controller
{
    public function index()
    {
        $items = SejarahGereja::all();
        return Inertia::render('Admin/SejarahGereja/Index', [
            'sejarahGerejas' => $items,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/SejarahGereja/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        SejarahGereja::create($request->only('judul','isi'));

        // sekarang route-nya 'admin.sejarah-gereja.index'
        return redirect()->route('admin.sejarah-gereja.index');
    }

    public function show(SejarahGereja $sejarahGereja)
    {
        return Inertia::render('Admin/SejarahGereja/Show', [
            'sejarahGereja' => $sejarahGereja,
        ]);
    }

    public function edit(SejarahGereja $sejarahGereja)
    {
        return Inertia::render('Admin/SejarahGereja/Edit', [
            'sejarahGereja' => $sejarahGereja,
        ]);
    }

    public function update(Request $request, SejarahGereja $sejarahGereja)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        $sejarahGereja->update($request->only('judul','isi'));

        return redirect()->route('admin.sejarah-gereja.index');
    }

    public function destroy(SejarahGereja $sejarahGereja)
    {
        $sejarahGereja->delete();
        return redirect()->route('admin.sejarah-gereja.index');
    }
}


