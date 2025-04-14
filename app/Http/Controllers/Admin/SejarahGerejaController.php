<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SejarahGereja;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SejarahGerejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sejarahGerejas = SejarahGereja::all();
        return Inertia::render('Admin/SejarahGerejas/Index', [
            'sejarahGerejas' => $sejarahGerejas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/SejarahGerejas/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        SejarahGereja::create($request->all());

        return redirect()->route('admin.sejarah-gerejas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SejarahGereja $sejarahGereja)
    {
        return Inertia::render('Admin/SejarahGerejas/Show', [
            'sejarahGereja' => $sejarahGereja,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SejarahGereja $sejarahGereja)
    {
        return Inertia::render('Admin/SejarahGerejas/Edit', [
            'sejarahGereja' => $sejarahGereja,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SejarahGereja $sejarahGereja)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        $sejarahGereja->update($request->all());

        return redirect()->route('admin.sejarah-gerejas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SejarahGereja $sejarahGereja)
    {
        $sejarahGereja->delete();

        return redirect()->route('admin.sejarah-gerejas.index');
    }
}
