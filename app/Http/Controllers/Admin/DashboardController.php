<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stasi;
use App\Models\JadwalTurne;
use App\Models\Kontak;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahStasi = Stasi::count();
        $totalUmat = Stasi::sum(DB::raw('umat_laki + umat_perempuan'));
        $pesanBelumDibaca = Kontak::where('is_read', false)->count();

        $currentMonthSchedules = JadwalTurne::with(['romo', 'stasi'])
            ->whereMonth('tanggal', now()->month)
            ->orderBy('tanggal')
            ->get();

        return Inertia::render('Admin/Dashboard', [
            'jumlahStasi' => $jumlahStasi,
            'totalUmat' => $totalUmat,
            'pesanBelumDibaca' => $pesanBelumDibaca,
            'currentMonthSchedules' => $currentMonthSchedules,
        ]);
    }
}
