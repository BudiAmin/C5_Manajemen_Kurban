<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HewanKurban;
use App\Models\DistribusiDaging;
use App\Models\JadwalPenyembelih;
use App\Models\PenerimaKurban;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Data Pilihan Hewan Kurban untuk Pendaftaran
        // Mengambil data dari HewanKurban yang berstatus 'Produk'
        $pilihanKurban = HewanKurban::where('Status_Hewan', 'Produk')
            ->orderBy('Jenis_Hewan', 'asc') 
            ->get();
        
        // 2. Data Jadwal Penyembelihan
        $jadwalPenyembelihans = JadwalPenyembelih::orderBy('Waktu_Penyembelih', 'asc')
            ->limit(5)
            ->get();

        // 3. Data Penerima Kurban
        $penerimaKurbans = PenerimaKurban::orderBy('Nama', 'asc')
            ->limit(10)
            ->get();
            
        // 4. Data Distribusi Daging
        $distribusiDaging = DistribusiDaging::with(['hewanKurban', 'penerimaKurban'])
            ->orderBy('Tanggal_Distribusi', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard', [
            'pilihanKurban' => $pilihanKurban,
            'jadwalPenyembelihans' => $jadwalPenyembelihans,
            'penerimaKurbans' => $penerimaKurbans,
            'distribusiDaging' => $distribusiDaging,
        ]);
    }
}