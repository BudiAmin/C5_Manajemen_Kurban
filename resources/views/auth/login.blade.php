<x-guest-layout>
    <h2 class="auth-title" style="color: #1a1a1a; margin-bottom: 0.5rem;">Masuk</h2>
    <p class="auth-subtitle" style="color: #6b7280; margin-bottom: 2rem;">Selamat datang kembali! Silakan masuk ke akun Anda</p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Alamat Email</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@email.com" />
            @error('email')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Kata Sandi</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi" />
            @error('password')
                <p class="error-text">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group">
            <label class="checkbox-container">
                <input id="remember_me" type="checkbox" class="checkbox-input" name="remember">
                <span style="font-size: 0.875rem; color: #4b5563;">Ingat saya</span>
            </label>
        </div>

        <div style="margin-top: 2rem;">
            <button type="submit" class="btn-primary">
                Masuk
            </button>
        </div>

        <div style="text-align: center; margin-top: 1.5rem;">
            @if (Route::has('password.request'))
                <a class="link-text" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            @endif
        </div>

        <div class="divider">
            <span style="background: white; padding: 0 1rem;">Atau</span>
        </div>

        <div style="text-align: center;">
            <p style="font-size: 0.875rem; color: #6b7280;">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="link-text">Daftar sekarang</a>
            </p>
        </div>
    </form>
</x-guest-layout>