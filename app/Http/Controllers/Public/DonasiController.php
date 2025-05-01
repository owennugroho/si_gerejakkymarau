<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Inertia\Inertia;

class DonasiController extends Controller
{
    public function index()
    {
        // ambil semua donasi, bisa diurutkan atau dipaginasi jika perlu
        $donasis = Donasi::all();

        return Inertia::render('Public/Donasi/Index', [
            'donasis' => $donasis,
        ]);
    }
}
