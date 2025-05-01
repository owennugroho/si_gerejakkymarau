<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Stasi;
use Inertia\Inertia;

class StasiController extends Controller
{
    public function index()
    {
        // ambil semua stasi
        $stasis = Stasi::orderBy('nama_stasi')->get();

        return Inertia::render('Public/Stasi/Index', [
            'stasis' => $stasis,
        ]);
    }

    public function show(Stasi $stasi)
    {
        return Inertia::render('Public/Stasi/Show', [
            'stasi' => $stasi,
        ]);
    }
}
