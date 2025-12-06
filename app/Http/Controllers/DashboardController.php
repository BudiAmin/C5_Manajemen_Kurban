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
            $q->where('ID_User', $userId);
        })
            ->with(['hewan.user', 'hewan.detail.ketersediaan'])
            ->get();

        // 1. Data Pilihan Hewan Kurban untuk Pendaftaran
        // Mengambil data dari HewanKurban yang berstatus 'Produk'
        // $pilihanKurban = HewanKurban::where('Status_Hewan', 'Produk')
        //     ->orderBy('Jenis_Hewan', 'asc')
        //     ->get();

        // jenis hewan 
        $hewanKurban = HewanKurban::with('detail.ketersediaan')->get();

        // pilih hewan kurban
        $detail_hewan = Detail::with('ketersediaan:id,Jenis_Hewan')->get();

        $detailPembayaran = HewanKurban::where('ID_User', $userId)
            ->with('user') // kalau ingin eager load user
            ->get();


        // Pelaksanaan Kurban
        $pelaksanaanKurban = Pelaksanaan::latest('id')->take(1)->get();


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

        // form pendaftaran kurban
        $pelaksanaan = Pelaksanaan::latest('id')->first();

        $today = Carbon::today();

        $isOpen = $today->between(
            Carbon::parse($pelaksanaan->Tanggal_Pendaftaran),
            Carbon::parse($pelaksanaan->Tanggal_Penutupan)
        );

        return view('dashboard', [
            // 'pilihanKurban' => $pilihanKurban,
            'jadwalPenyembelihans' => $jadwalPenyembelihans,
            'penerimaKurbans' => $penerimaKurbans,
            'distribusiDaging' => $distribusiDaging,
            'pelaksanaanKurban' => $pelaksanaanKurban,
            'penyembelihan' => $penyembelihan,
            'detail_hewan' => $detail_hewan,
            'detailPembayaran' => $detailPembayaran,
            'hewanKurban' => $hewanKurban,
            'detail_hewan' => $detail_hewan,
            'isOpen' => $isOpen,
            'pelaksanaan' => $pelaksanaan
        ]);
    }


    // bayar kurban
    public function updateBukti(Request $request, $id)
    {
        $request->validate([
            'Bukti_Bayar' => 'required|image|max:2048',
        ]);

        $hewan = HewanKurban::where('ID_Hewan', $id)
            ->where('ID_User', Auth::id()) // pastikan milik user login
            ->firstOrFail();

        if ($request->hasFile('Bukti_Bayar')) {
            $file = $request->file('Bukti_Bayar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/pembayaran', $filename);

            $hewan->Bukti_Bayar = $filename;

            // Set status otomatis
            $hewan->Status = 'Menunggu Verifikasi';

            $hewan->save();
        }

        return back()->with('success', 'Bukti pembayaran berhasil diupload dan status diubah menjadi Menunggu Verifikasi.');
    }
}
