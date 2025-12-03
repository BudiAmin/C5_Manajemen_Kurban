<?php

namespace App\Http\Controllers;

use App\Models\detail;
use Carbon\Carbon;
use App\Models\HewanKurban;
use App\Models\Pelaksanaan;
use Illuminate\Http\Request;
use App\Models\Penyembelihan;
use App\Models\PenerimaKurban;
use App\Models\DistribusiDaging;
use App\Models\JadwalPenyembelih;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $penyembelihan = Penyembelihan::whereHas('hewan', function ($q) use ($userId) {
            $q->where('id_user', $userId);
        })
            ->with(['hewan.user'])
            ->get();

        // 1. Data Pilihan Hewan Kurban untuk Pendaftaran
        // Mengambil data dari HewanKurban yang berstatus 'Produk'
        // $pilihanKurban = HewanKurban::where('Status_Hewan', 'Produk')
        //     ->orderBy('Jenis_Hewan', 'asc')
        //     ->get();

        // pilih hewan kurban
        $detail_hewan = Detail::with('ketersediaan:id,Jenis_Hewan')->get();


        // Pelaksanaan Kurban
        $pelaksanaanKurban = Pelaksanaan::orderBy('id', 'asc')
            ->limit(5)
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
            // 'pilihanKurban' => $pilihanKurban,
            'jadwalPenyembelihans' => $jadwalPenyembelihans,
            'penerimaKurbans' => $penerimaKurbans,
            'distribusiDaging' => $distribusiDaging,
            'pelaksanaanKurban' => $pelaksanaanKurban,
            'penyembelihan' => $penyembelihan,
            'detail_hewan' => $detail_hewan,
        ]);
    }
}
