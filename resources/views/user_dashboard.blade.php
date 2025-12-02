<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard User - Manajemen Kurban</title>
    <meta name="description" content="Dashboard pengguna untuk pendaftaran dan monitoring kurban">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        /* Local helpers to complement the site's stylesheet */
        .dashboard-grid { display: grid; grid-template-columns: 1fr; gap: 1.25rem; }
        @media (min-width: 1024px) { .dashboard-grid { grid-template-columns: 360px 1fr; } }
        .input { width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border); border-radius: var(--radius); background-color: var(--background); color: var(--foreground); }
        .card { background-color: var(--card); border-radius: var(--radius-lg); padding: 1.25rem; box-shadow: var(--shadow-card); }
        .muted { color: var(--muted-foreground); font-size: 0.95rem; }
        .stack { display: grid; gap: 1rem; }
        .actions { display:flex; gap:0.5rem; flex-wrap:wrap; }
    </style>
</head>

<body>
    <header class="header">
        <div class="container header-content">
            <div class="logo">
                <div class="logo-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                </div>
                <div class="logo-text">Manajemen Kurban</div>
            </div>
            <nav class="nav-desktop">
                <a href="{{ url('/') }}">Beranda</a>
                <a href="{{ route('user.dashboard') }}" class="font-semibold">Dashboard</a>
            </nav>
        </div>
    </header>

    <main class="container" style="padding:2.5rem 1rem;">
        <h1 class="section-title">Dashboard Pengguna</h1>
        <p class="muted" style="margin-bottom:1rem;">Halaman demo UI — semua tombol bersifat contoh. Untuk fungsionalitas lengkap hubungkan ke backend.</p>

        <div class="dashboard-grid">
            <!-- Sidebar Actions (no account/login) -->
            <aside>
                <div class="card form-card stack">
                    <div>
                        <h3 class="form-title">Pendaftaran Kurban</h3>
                        <p class="muted">Isi formulir singkat untuk mendaftar.</p>
                    </div>

                    <form method="POST" action="#" enctype="multipart/form-data" class="stack">
                        @csrf
                        <div class="form-group">
                            <label>Jenis Hewan</label>
                            <select class="input">
                                <option>Sapi</option>
                                <option>Kambing</option>
                                <option>Domba</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah / Patungan</label>
                            <input class="input" type="number" min="1" value="1">
                        </div>
                        <div class="form-group">
                            <label>Menitip Bayar</label>
                            <select class="input">
                                <option value="tidak">Tidak</option>
                                <option value="ya">Ya (Rp 200.000)</option>
                            </select>
                        </div>
                        <div class="form-group form-group-btn actions">
                            <button type="button" class="btn btn-gold">Daftar Sekarang</button>
                            <button type="reset" class="btn btn-outline">Reset</button>
                        </div>
                    </form>
                </div>
            </aside>

            <!-- Main content -->
            <section>
                <div class="table-card" style="margin-bottom:1rem;">
                    <div style="padding:1rem 1.25rem;">
                        <h3 class="form-title">Riwayat Pendaftaran Kurban</h3>
                        <p class="muted">Lihat status pendaftaran Anda.</p>
                    </div>
                    <div style="padding:0 1.25rem 1.25rem;">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Hewan</th>
                                    <th>Jumlah/Patungan</th>
                                    <th>Status</th>
                                    <th class="hide-mobile">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Sapi</td>
                                    <td>1 (patungan 5)</td>
                                    <td><span class="badge badge-muted">Pending</span></td>
                                    <td class="hide-mobile"><button class="btn btn-outline">Detail</button></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kambing</td>
                                    <td>1</td>
                                    <td><span class="badge badge-success">Diterima</span></td>
                                    <td class="hide-mobile"><button class="btn btn-outline">Detail</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card form-card" style="margin-bottom:1rem;">
                    <h3 class="form-title">Pembayaran / Upload Bukti Transfer</h3>
                    <p class="muted">Upload bukti untuk diverifikasi oleh admin.</p>

                    <form method="POST" action="#" enctype="multipart/form-data" class="stack" style="margin-top:0.75rem;">
                        @csrf
                        <div class="form-group">
                            <label>Pilih Pendaftaran</label>
                            <select class="input">
                                <option value="1">#1 — Sapi (Pending)</option>
                                <option value="2">#2 — Kambing (Diterima)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Upload Bukti (jpg/png/pdf)</label>
                            <input class="input" type="file">
                        </div>
                        <div class="form-group form-group-btn actions">
                            <button type="button" class="btn btn-gold">Upload</button>
                            <button type="button" class="btn btn-outline">Batalkan</button>
                        </div>
                        <div class="muted">Status Pembayaran: <strong>#1</strong> — Menunggu verifikasi</div>
                    </form>
                </div>

                <div class="card form-card" style="margin-bottom:1rem;">
                    <h3 class="form-title">Jadwal & Notifikasi</h3>
                    <div class="stack" style="margin-top:0.5rem;">
                        <div>
                            <strong>Jadwal Penyembelihan</strong>
                            <p class="muted">30 Jun 2026 — Lapangan Masjid Al-Ikhlas</p>
                            <ul class="muted">
                                <li>• 09:00 — Sapi</li>
                                <li>• 13:00 — Kambing / Domba</li>
                            </ul>
                        </div>
                        <div>
                            <strong>Notifikasi Status</strong>
                            <ul class="muted">
                                <li>✔ Terdaftar — #2</li>
                                <li>✔ Terverifikasi — #2</li>
                                <li>✔ Hewan siap sembelihan — #2</li>
                                <li>⏳ Menunggu verifikasi pembayaran — #1</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card form-card">
                    <h3 class="form-title">Distribusi & Dokumentasi</h3>
                    <div class="stack" style="margin-top:0.5rem;">
                        <div>
                            <strong>Distribusi</strong>
                            <p class="muted">#2 — Siap diambil di Masjid (24 Jul 2026)</p>
                        </div>
                        <div>
                            <strong>Download</strong>
                            <div class="actions" style="margin-top:0.5rem;">
                                <a class="btn btn-secondary" href="#">Unduh Sertifikat</a>
                                <a class="btn btn-outline" href="#">Unduh Dokumentasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>© 2026 Manajemen Kurban</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
