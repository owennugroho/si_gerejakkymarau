<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Visimisi;
use Inertia\Inertia;

class VisimisiController extends Controller
{
    public function index()
    {
        // ambil entri terakhir (atau ID=1, sesuai kebutuhan)
        $item = Visimisi::latest()->first();

        return Inertia::render('Public/Visimisi/Show', [
            'visimisi' => $item,
        ]);
    }
}
