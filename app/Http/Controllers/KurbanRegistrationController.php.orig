<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HewanKurban;
use App\Models\Detail; // tabel harga hewan
use Illuminate\Support\Facades\Auth;

class KurbanRegistrationController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create()
    {
        return view('daftar_kurban');
    }

    /**
     * Validate and store temporary registration then redirect to next step view.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'ID_Detail' => 'required|exists:details,id',
            'jumlah_patungan' => 'required|integer|min:1',
            'titip_bayar' => 'required|in:ya,tidak',
        ]);

        // Ambil data hewan dari tabel details
        $detail = Detail::findOrFail($request->ID_Detail);

        // Hitung total harga (Harga × jumlah)
        $totalHarga = $detail->Harga * $request->jumlah_patungan;

        // Simpan ke tabel hewan_kurban
        HewanKurban::create([
            'ID_Detail'      => $request->ID_Detail,
            'ID_User'       => Auth::id(),
            'Titip_bayar'   => $request->titip_bayar,
            'Total_Hewan'   => $request->jumlah_patungan,
            'Total_Harga'   => $totalHarga,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Pendaftaran kurban berhasil!');
    }

    /**
     * Show the next/confirmation page with submitted values (pulled from session).
     */
    public function next(Request $request)
    {
        $data = $request->session()->get('daftar_kurban');

        if (!$data) {
            return redirect()->route('kurban.create');
        }

        return view('dashboard', ['data' => $data]);
    }
}
