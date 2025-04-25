<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visimisi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visimisis = Visimisi::all();

        return Inertia::render('Admin/Visimisi/Index', [
            'visimisis' => $visimisis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Visimisi/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'      => 'required|string|max:255',
            'isi'        => 'required|string',
        ]);

        // Otomatis set tanggal_isi ke sekarang
        $data['tanggal_isi'] = now();

        Visimisi::create($data);

        return redirect()->route('admin.visimisi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visimisi $visimisi)
    {
        return Inertia::render('Admin/Visimisi/Show', [
            'visimisi' => $visimisi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visimisi $visimisi)
    {
        return Inertia::render('Admin/Visimisi/Edit', [
            'visimisi' => $visimisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visimisi $visimisi)
    {
        $data = $request->validate([
            'judul'      => 'required|string|max:255',
            'isi'        => 'required|string',
        ]);

        // Perbarui tanggal_isi
        $data['tanggal_isi'] = now();

        $visimisi->update($data);

        return redirect()->route('admin.visimisi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visimisi $visimisi)
    {
        $visimisi->delete();

        return redirect()->route('admin.visimisi.index');
    }
}
