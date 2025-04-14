<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visimisi;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VisimisiController extends Controller
{
    public function index()
    {
        $visimisis = Visimisi::all();
        return Inertia::render('Admin/Visimisis/Index', [
            'visimisis' => $visimisis,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Visimisis/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        Visimisi::create($request->all());

        return redirect()->route('visimisis.index');
    }

    public function show(Visimisi $visimisi)
    {
        return Inertia::render('Admin/Visimisis/Show', [
            'visimisi' => $visimisi,
        ]);
    }

    public function edit(Visimisi $visimisi)
    {
        return Inertia::render('Admin/Visimisis/Edit', [
            'visimisi' => $visimisi,
        ]);
    }

    public function update(Request $request, Visimisi $visimisi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        $visimisi->update($request->all());

        return redirect()->route('visimisis.index');
    }

    public function destroy(Visimisi $visimisi)
    {
        $visimisi->delete();

        return redirect()->route('visimisis.index');
    }
}
