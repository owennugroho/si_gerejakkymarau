<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stasi;
use App\Models\JadwalTurne;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // 1) yearly stats: how many stasi, and total umat
        $stats = Stasi::selectRaw("
                YEAR(created_at) AS year,
                COUNT(*)             AS stasi_count,
                SUM(umat_laki + umat_perempuan) AS total_umat
            ")
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        // 2) all Stasi created this month
        $currentMonthData = Stasi::whereMonth('created_at', now()->month)
                                 ->get();

        // 3) all JadwalTurne happening this month
        $currentMonthSchedules = JadwalTurne::with('romo')
            ->whereMonth('tanggal', now()->month)
            ->get();

        return Inertia::render('Admin/Dashboard', [
            'stats'                   => $stats,
            'currentMonthData'        => $currentMonthData,
            'currentMonthSchedules'   => $currentMonthSchedules,
        ]);
    }
}
