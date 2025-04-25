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
        $items = Info::all();

        return Inertia::render('Admin/Info/Index', [
            'infos' => $items,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Info/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        Info::create($data);

        return redirect()->route('admin.info.index');
    }

    public function show(Info $info)
    {
        return Inertia::render('Admin/Info/Show', [
            'info' => $info,
        ]);
    }

    public function edit(Info $info)
    {
        return Inertia::render('Admin/Info/Edit', [
            'info' => $info,
        ]);
    }

    public function update(Request $request, Info $info)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi'   => 'required|string',
        ]);

        $info->update($data);

        return redirect()->route('admin.info.index');
    }

    public function destroy(Info $info)
    {
        $info->delete();

        return redirect()->route('admin.info.index');
    }
}
