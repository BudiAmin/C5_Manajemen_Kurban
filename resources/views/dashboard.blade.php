<x-app-layout>
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Dashboard User - Manajemen Kurban</title>
        <meta name="description" content="Dashboard pengguna untuk pendaftaran dan monitoring kurban">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        <style>
            .dashboard-grid { display: grid; grid-template-columns: 1fr; gap: 1.25rem; }
            @media (min-width: 1024px) { .dashboard-grid { grid-template-columns: 360px 1fr; } }
            .input { width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border); border-radius: var(--radius); background-color: var(--background); color: var(--foreground); }
            .card { background-color: var(--card); border-radius: var(--radius-lg); padding: 1.25rem; box-shadow: var(--shadow-card); }
            .muted { color: var(--muted-foreground); font-size: 0.95rem; }
            .stack { display: grid; gap: 1rem; }
            .actions { display:flex; gap:0.5rem; flex-wrap:wrap; }
            .table-responsive { overflow-x: auto; }
        </style>
    </head>

    <body>
        <main class="container" style="padding:2.5rem 1rem;">
            <h1 class="section-title">Dashboard Pengguna</h1>
            <p class="muted" style="margin-bottom:1rem;">Halaman ini menampilkan data kurban yang terhubung ke database.</p>

            <div class="dashboard-grid">
                <aside>
                    <div class="card form-card stack" style="margin-bottom:1.25rem;">
                        <div>
                            <h3 class="form-title">Pendaftaran Kurban</h3>
                            <p class="muted">Pilih hewan kurban Anda dari daftar yang tersedia.</p>
                        </div>

                        <form method="POST" action="{{ route('kurban.store') }}" class="stack">
                            @csrf
                            <div class="form-group">
                                <label for="jenis_hewan">Pilih Hewan Kurban</label>
                                <select class="input" id="jenis_hewan" name="ID_Hewan">
                                    @forelse ($pilihanKurban as $pilihan)
                                        <option value="{{ $pilihan->ID_Hewan }}">
                                            {{ $pilihan->Jenis_Hewan }} 
                                            {{-- Kolom harga/deskripsi tidak ada, hanya tampilkan Jenis_Hewan --}}
                                        </option>
                                    @empty
                                        <option disabled>Hewan kurban tidak tersedia saat ini.</option>
                                    @endforelse
                                </select>
                                @if ($pilihanKurban->isEmpty())
                                    <p class="muted" style="margin-top:0.5rem; color: var(--color-red);">Tidak ada hewan yang bisa didaftarkan.</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Jumlah / Patungan</label>
                                <input class="input" type="number" min="1" value="1" name="jumlah_patungan">
                            </div>

                            <div class="form-group">
                                <label>Menitip Bayar</label>
                                <select class="input" name="titip_bayar">
                                    <option value="tidak">Tidak</option>
                                    <option value="ya">Ya (Rp 200.000)</option>
                                </select>
                            </div>

                            <div class="actions">
                                <button type="submit" class="btn btn-gold" @if($pilihanKurban->isEmpty()) disabled @endif>Daftar Sekarang</button>
                                <button type="reset" class="btn btn-outline">Reset</button>
                            </div>
                        </form>
                    </div>

                    <div class="card form-card">
                        <h3 class="form-title">Daftar Penerima Kurban</h3>
                        <p class="muted">Nama-nama yang akan menerima distribusi daging kurban.</p>
                        
                        <div class="stack" style="margin-top:0.75rem;">
                            @forelse ($penerimaKurbans as $penerima)
                            <div style="border-bottom: 1px solid var(--border); padding-bottom: 0.5rem; margin-bottom: 0.5rem;">
                                <strong>{{ $penerima->Nama }}</strong>
                                <p class="muted">{{ $penerima->Tempat_Tinggal }}</p>
                            </div>
                            @empty
                                <p class="muted">Belum ada daftar penerima kurban yang terverifikasi.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>

                <section>
                    <div class="table-card" style="margin-bottom:1rem;">
                        <div style="padding:1rem 1.25rem;">
                            <h3 class="form-title">Jadwal Penyembelihan Kurban</h3>
                            <p class="muted">Informasi tanggal, waktu, dan lokasi penyembelihan.</p>
                        </div>

                        <div class="table-responsive" style="padding:0 1.25rem 1.25rem;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tanggal & Waktu</th>
                                        <th>Penyembelih</th>
                                        <th>Lokasi</th>
                                        <th class="hide-mobile">ID Operasional</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($jadwalPenyembelihans as $jadwal)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($jadwal->Waktu_Penyembelih)->format('d M Y H:i') }}</td>
                                        <td>{{ $jadwal->Nama_Penyembelih }}</td>
                                        <td>{{ $jadwal->Lokasi_Penyembelih }}</td>
                                        <td class="hide-mobile">{{ $jadwal->ID_Operasional }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; padding: 1rem;">Jadwal penyembelihan belum ditetapkan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="table-card" style="margin-bottom:1rem;">
                        <div style="padding:1rem 1.25rem;">
                            <h3 class="form-title">Riwayat Distribusi Daging</h3>
                            <p class="muted">Catatan distribusi daging kurban yang telah dilakukan.</p>
                        </div>

                        <div class="table-responsive" style="padding:0 1.25rem 1.25rem;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Hewan Asal</th>
                                        <th>Penerima</th>
                                        <th class="hide-mobile">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($distribusiDaging as $distribusi)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($distribusi->Tanggal_Distribusi)->format('d M Y') }}</td>
                                        <td>{{ $distribusi->hewanKurban->Jenis_Hewan ?? 'N/A' }}</td>
                                        <td>{{ $distribusi->penerimaKurban->Nama ?? $distribusi->Penerima }}</td>
                                        <td class="hide-mobile">{{ $distribusi->Status_Distribusi }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; padding: 1rem;">Belum ada riwayat distribusi daging.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card form-card">
                        <h3 class="form-title">Notifikasi Penting</h3>
                        <p class="muted">Informasi umum terkait status kurban Anda.</p>
                        <div class="stack" style="margin-top:0.5rem;">
                            <ul class="muted">
                                <li>⏳ Status pembayaran kurban Anda sedang diverifikasi.</li>
                                <li>✔ Hewan kurban Kambing telah siap untuk disembelih.</li>
                                <li>ℹ️ Mohon cek jadwal penyembelihan di tabel di atas.</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <script src="{{ asset('js/script.js') }}"></script>
    </body>

    </html>
</x-app-layout>