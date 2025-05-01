<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Inertia\Inertia;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::all();

        return Inertia::render('Public/Info/Index', [
            'infos' => $infos,
        ]);
    }
}
