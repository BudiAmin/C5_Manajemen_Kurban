<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $data = $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'tempat_tinggal' => 'required|string|max:255',
            'jenis_hewan' => 'required|string|in:Sapi,Kambing,Domba',
            'menitip_bayar' => 'required|in:ya,tidak',
            'terms' => 'accepted',
        ]);

        // For now store the data in session so we can demo the next step
        $request->session()->put('daftar_kurban', $data);

        return redirect()->route('kurban.next');
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

        return view('daftar_kurban_next', ['data' => $data]);
    }
}
