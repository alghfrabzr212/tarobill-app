<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BillController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('user.welcome');
});

// Halaman login
Route::get('/login', function () {
    return view('user.login');
});

// Redirect dashboard setelah login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    })->name('dashboard');
});

// ===============================
// Authenticated Routes
// ===============================
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ===============================
    // ADMIN ROUTES (role: admin)
    // ===============================
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
        Route::delete('/accounts/{user}', [AccountController::class, 'destroy'])->name('accounts.destroy');
    });

    // ===============================
    // USER ROUTES (role: user)
    // ===============================
    Route::prefix('user')->name('user.')->group(function () {
        // Dashboard user
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

        // Tagihan
        Route::get('/tagihan', [UserController::class, 'tagihan'])->name('tagihan');
        Route::get('/tagihan/create', [UserController::class, 'createTagihan'])->name('tagihan.create');

        // Riwayat
        Route::get('/riwayat', [UserController::class, 'riwayat'])->name('riwayat');

        // CRUD tagihan (BillController)
        Route::get('/bills', [BillController::class, 'index'])->name('bills.index');
        Route::get('/bills/create', [BillController::class, 'create'])->name('bills.create');
        Route::post('/bills', [BillController::class, 'store'])->name('bills.store');
        Route::get('/bills/{id}/edit', [BillController::class, 'edit'])->name('bills.edit');
        Route::put('/bills/{id}', [BillController::class, 'update'])->name('bills.update');
        Route::delete('/bills/{id}', [BillController::class, 'destroy'])->name('bills.destroy');
    });
});

// Auth (Login, Register, dll)
require __DIR__.'/auth.php';
