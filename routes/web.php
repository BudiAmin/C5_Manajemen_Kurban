<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; // Tambahkan ini
use App\Http\Controllers\KurbanRegistrationController; // Asumsi ini ada

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rute Kurban registration
Route::get('/daftar-kurban', [KurbanRegistrationController::class, 'create'])->name('kurban.create');
Route::post('/daftar-kurban', [KurbanRegistrationController::class, 'store'])->name('kurban.store');
Route::get('/daftar-kurban/lanjut', [KurbanRegistrationController::class, 'next'])->name('kurban.next');

// bayar
Route::put('/hewan-kurban/{id}/update-bukti', [DashboardController::class, 'updateBukti'])
    ->name('hewan_kurban.update_bukti')
    ->middleware('auth');


// Ganti rute dashboard
Route::get('/dashboard', [DashboardController::class, 'index']) // Gunakan DashboardController
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';