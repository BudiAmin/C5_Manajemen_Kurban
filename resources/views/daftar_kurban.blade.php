@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-4">Form Pendaftaran Peserta Kurban</h1>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="daftarKurbanForm" action="{{ route('kurban.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Peserta</label>
                        <input type="text" name="nama_peserta" id="nama_peserta" value="{{ old('nama_peserta') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tempat Tinggal</label>
                        <input type="text" name="tempat_tinggal" id="tempat_tinggal" value="{{ old('tempat_tinggal') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Hewan</label>
                        <select name="jenis_hewan" id="jenis_hewan"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            <option value="">-- Pilih jenis hewan --</option>
                            <option value="Sapi" {{ old('jenis_hewan') == 'Sapi' ? 'selected' : '' }}>Sapi</option>
                            <option value="Kambing" {{ old('jenis_hewan') == 'Kambing' ? 'selected' : '' }}>Kambing</option>
                            <option value="Domba" {{ old('jenis_hewan') == 'Domba' ? 'selected' : '' }}>Domba</option>
                        </select>
                    </div>

                    <div>
                        <span class="block text-sm font-medium text-gray-700">Menitip bayar Rp 200.000</span>
                        <div class="mt-1 flex gap-4 items-center">
                            <label class="inline-flex items-center">
                                <input type="radio" name="menitip_bayar" value="ya" {{ old('menitip_bayar') == 'ya' ? 'checked' : '' }}> <span class="ml-2">Ya</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="menitip_bayar" value="tidak" {{ old('menitip_bayar') == 'tidak' ? 'checked' : '' }}> <span class="ml-2">Tidak</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" {{ old('terms') ? 'checked' : '' }}
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" required>
                        <label for="terms" class="ml-2 block text-sm text-gray-900">Saya setuju dengan <a href="#"
                                class="text-indigo-600 underline">syarat & ketentuan</a></label>
                    </div>

                    <div class="pt-4">
                        <button id="lanjutkanBtn" type="submit" disabled
                            class="px-4 py-2 bg-indigo-600 text-white rounded disabled:opacity-50">Lanjutkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // enable the submit button only when required fields are filled and terms are checked
        (function () {
            const btn = document.getElementById('lanjutkanBtn');
            const form = document.getElementById('daftarKurbanForm');
            const requiredFields = ['nama_peserta', 'tempat_tinggal', 'jenis_hewan'];

            function checkValid() {
                const filled = requiredFields.every(id => document.getElementById(id).value.trim() !== '');
                const terms = document.getElementById('terms').checked;
                // check one of radio buttons
                const menitip = Array.from(document.getElementsByName('menitip_bayar')).some(i => i.checked);
                btn.disabled = !(filled && terms && menitip);
            }

            form.addEventListener('input', checkValid);
            document.addEventListener('DOMContentLoaded', checkValid);
        })();
    </script>

@endsection