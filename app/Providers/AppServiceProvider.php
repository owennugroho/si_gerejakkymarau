<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use App\Models\Info;
use App\Models\JadwalTurne;
use App\Models\Donasi;
use Illuminate\Support\Facades\Vite;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Jika kamu pakai Vite
        Vite::prefetch(concurrency: 3);

        // Share data footer ke semua Inertia requests
        Inertia::share([
            'footer.info' => function () {
                return Info::first();
            },
            'footer.jadwalEkaristi' => function () {
                return JadwalTurne::whereMonth('tanggal', now()->month)
                                  ->get(['hari', 'jam_mulai']);
            },
        ]);
    }
}
