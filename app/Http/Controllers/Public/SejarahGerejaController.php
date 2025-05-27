<?php
namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SejarahGereja;
use Inertia\Inertia;

class SejarahGerejaController extends Controller
{
    public function index()
    {
        // ambil entri pertama (atau entri dengan ID = 1,
        // atau latest()->first(), terserah)
        $history = SejarahGereja::latest()->first();

        return Inertia::render('Public/SejarahGereja/Show', [
            'sejarahGereja' => $history,
        ]);
    }
}
