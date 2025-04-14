<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::all();
        return Inertia::render('Admin/Infos/Index', [
            'infos' => $infos,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Infos/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        Info::create($request->all());

        return redirect()->route('infos.index');
    }

    public function show(Info $info)
    {
        return Inertia::render('Admin/Infos/Show', [
            'info' => $info,
        ]);
    }

    public function edit(Info $info)
    {
        return Inertia::render('Admin/Infos/Edit', [
            'info' => $info,
        ]);
    }

    public function update(Request $request, Info $info)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        $info->update($request->all());

        return redirect()->route('infos.index');
    }

    public function destroy(Info $info)
    {
        $info->delete();

        return redirect()->route('infos.index');
    }
}
