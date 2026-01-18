<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Visimisi;
use Inertia\Inertia;

class VisimisiController extends Controller
{
    public function index()
    {
        // Ambil semua entri
        $visimisis = Visimisi::orderBy('created_at')->get();

        return Inertia::render('Public/Visimisi/Index', [
            'visimisis' => $visimisis,
        ]);
    }
}
