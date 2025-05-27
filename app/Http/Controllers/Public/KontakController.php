<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KontakController extends Controller
{
    public function create()
    {
        return Inertia::render('Public/Kontak/Create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name'            => 'required|string|max:100',
        'email'           => 'nullable|email',
        'message'         => 'required|string',
        'asal_paroki'     => 'nullable|string|max:150',
        'asal_lingkungan' => 'nullable|string|max:150',
        'phone'           => 'nullable|string|max:20',   // <— ganti nomor_hp → phone
        'can_whatsapp'    => 'boolean',
    ]);

    $data['can_whatsapp'] = $request->has('can_whatsapp');
    $data['is_read']      = false;

    Kontak::create($data);

    return redirect()->route('kontak.create')
                     ->with('success','Pesan Anda telah terkirim, silahkan tunggu, sekretariat gereja akan segera menghubungi anda. terima kasih!');
}


}
