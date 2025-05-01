<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\KegiatanFoto;
use Inertia\Inertia;

class KegiatanFotoController extends Controller
{
    /**
     * Tampilkan list semua foto kegiatan.
     */
    public function index()
    {
        $items = KegiatanFoto::orderBy('created_at','desc')->get();

        return Inertia::render('Public/KegiatanFoto/Index', [
            'fotos' => $items,
        ]);
    }

    /**
     * Tampilkan detail satu foto kegiatan.
     */
    public function show(KegiatanFoto $kegiatanFoto)
    {
        return Inertia::render('Public/KegiatanFoto/Show', [
            'foto' => $kegiatanFoto,
        ]);
    }
}
