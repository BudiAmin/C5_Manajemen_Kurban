@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-4">Konfirmasi Pendaftaran</h1>

            <div class="space-y-3">
                <div><strong>Nama Peserta:</strong> {{ $data['nama_peserta'] }}</div>
                <div><strong>Tempat Tinggal:</strong> {{ $data['tempat_tinggal'] }}</div>
                <div><strong>Jenis Hewan:</strong> {{ $data['jenis_hewan'] }}</div>
                <div><strong>Menitip bayar Rp 200.000:</strong> {{ $data['menitip_bayar'] == 'ya' ? 'Ya' : 'Tidak' }}</div>
            </div>

            <div class="mt-6 flex gap-3">
                <form method="GET" action="{{ route('kurban.create') }}">
                    <button type="submit" class="px-4 py-2 border rounded">Kembali & Sunting</button>
                </form>

                <form method="POST" action="#">
                    @csrf
                    <button type="button" onclick="alert('Langkah selanjutnya: pembayaran / penyimpanan sementara.');"
                        class="px-4 py-2 bg-green-600 text-white rounded">Selesai</button>
                </form>
            </div>
        </div>
    </div>

@endsection