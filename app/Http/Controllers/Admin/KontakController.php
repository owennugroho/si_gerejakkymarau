<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Inertia\Inertia;

class KontakController extends Controller
{
    /** Tampilkan semua pesan */
    public function index()
    {
        $kontaks = Kontak::orderByDesc('created_at')->get();
        return Inertia::render('Admin/Kontak/Index', [
            'kontaks' => $kontaks,
        ]);
    }

    /** Tampilkan detail & tandai sudah dibaca */
    public function show(Kontak $kontak)
    {
        if (!$kontak->is_read) {
            $kontak->update(['is_read' => true]);
            $kontak->refresh();
        }

        return Inertia::render('Admin/Kontak/Show', [
            'kontak' => [
                'id' => $kontak->id,
                'name' => $kontak->name,
                'email' => $kontak->email,
                'phone' => $kontak->phone,
                'can_whatsapp' => $kontak->can_whatsapp,
                'asal_paroki' => $kontak->asal_paroki,
                'asal_lingkungan' => $kontak->asal_lingkungan,
                'message' => $kontak->message,
                'is_read' => $kontak->is_read,
                'sent_at' => $kontak->created_at?->format('d M Y H:i'),
            ],
        ]);
    }

    public function toggleRead(Kontak $kontak)
    {
        $kontak->update(['is_read' => !$kontak->is_read]);

        // Kalau lewat AJAX/Inertia XHR, cukup reply JSON:
        return response()->json([
            'id' => $kontak->id,
            'is_read' => $kontak->is_read,
        ]);
    }
    public function destroy(Kontak $kontak)
{
    $kontak->delete();

    // Redirect kembali ke index dengan flash (opsional)
    return redirect()
        ->route('admin.kontak.index')
        ->with('success', 'Pesan kontak berhasil dihapus.');
}
}
