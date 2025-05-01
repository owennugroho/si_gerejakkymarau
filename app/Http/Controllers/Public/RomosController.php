<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Romos;
use Inertia\Inertia;

class RomosController extends Controller
{
    /**
     * Tampilkan semua romos.
     */
    public function index()
    {
        $items = Romos::orderBy('nama')->get();

        return Inertia::render('Public/Romos/Index', [
            'romos' => $items,
        ]);
    }

    /**
     * Tampilkan detail satu romos.
     */
    public function show(Romos $romos)
    {
        return Inertia::render('Public/Romos/Show', [
            'romo' => $romos,
        ]);
    }
}
