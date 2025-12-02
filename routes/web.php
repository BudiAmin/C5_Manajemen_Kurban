<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Kurban registration
use App\Http\Controllers\KurbanRegistrationController;

Route::get('/daftar-kurban', [KurbanRegistrationController::class, 'create'])->name('kurban.create');
Route::post('/daftar-kurban', [KurbanRegistrationController::class, 'store'])->name('kurban.store');
Route::get('/daftar-kurban/lanjut', [KurbanRegistrationController::class, 'next'])->name('kurban.next');

// User dashboard (static UI - no login required)
Route::get('/user-dashboard', function () {
    return view('user_dashboard');
})->name('user.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
