<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Inertia\Inertia;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('id', 'desc')->get();

        return Inertia::render('Public/Berita/Index', [
            'beritas' => $beritas,
        ]);
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return Inertia::render('Public/Berita/Show', [
            'berita' => $berita,
        ]);
    }
}
