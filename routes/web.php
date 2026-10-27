<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController; // <-- Tambahkan ini

// 1. Route Publik (Landing Page)
Route::get('/', function () {
    return view('welcome'); 
});

// 2. Route Auth Breeze (Login, Register, Logout, dll)
require __DIR__.'/auth.php';

// 3. Route Profile (Bawaan Breeze - INI YANG TADI HILANG)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. Route Dashboard Utama (DISPATCHER)
Route::get('/dashboard', function () {
    $user = Auth::user();
    
    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } 
    if ($user->hasRole('fotografer')) {
        return redirect()->route('fotografer.dashboard');
    } 
    if ($user->hasRole('pimpinan')) {
        return redirect()->route('pimpinan.dashboard');
    } 
    if ($user->hasRole('pelanggan')) {
        return redirect()->route('pelanggan.dashboard');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 5. Route Khusus Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});

// 6. Route Khusus Fotografer
Route::middleware(['auth', 'role:fotografer'])->prefix('fotografer')->name('fotografer.')->group(function () {
    Route::get('/dashboard', function () {
        return view('fotografer.dashboard');
    })->name('dashboard');
});

// 7. Route Khusus Pimpinan
Route::middleware(['auth', 'role:pimpinan'])->prefix('pimpinan')->name('pimpinan.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pimpinan.dashboard');
    })->name('dashboard');
});

// 8. Route Khusus Pelanggan
Route::middleware(['auth', 'role:pelanggan'])->prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pelanggan.dashboard');
    })->name('dashboard');

    // UC006: Form Booking
    Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});