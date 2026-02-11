<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


    // Public Routes
    // Home
    Route::get('/', function () {
        return view('welcome');
    });

    // Register
    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerform');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    // Login
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {

        Route::middleware('role:admin')->prefix('admin')->group(function () {
            Route::get('dashboard', function () {
                return view('admin.dashboard');
            })->name('admin.dashboard');

            Route::get('/daftarpengguna', function () {
                return view('admin.daftarpengguna');
            })->name('admin.daftarpengguna');

            Route::get('/daftarpengaduan', function () {
                return view('admin.daftarpengaduan');
            })->name('admin.daftarpengaduan');

            Route::get('/detailpengaduan', function () {
                return view('admin.detailpengaduan');
            })->name('admin.detailpengaduan');

            // Route::get('/detailpengaduan/{id}', function ($id) {
            //     return view('admin.detailpengaduan', compact('id'));
            // })->name('admin.detailpengaduan');

            Route::get('/kategori', function () {
                return view('admin.kategori');
            })->name('admin.kategori');
        });

        Route::middleware('role:user')->prefix('user')->group(function () {
            Route::get('dashboard', function () {
                return view('user.dashboard');
            })->name('user.dashboard');

            Route::get('/form_pengaduan', function () {
                return view('user.form_pengaduan');
            })->name('user.form_pengaduan');

             Route::get('/riwayatpengaduan', function () {
                return view('user.riwayatpengaduan');
            })->name('user.riwayatpengaduan');

            Route::get('/profil', function () {
                return view('user.profil');
            })->name('user.profil');

            Route::get('/detailpengaduan', function () {
                return view('user.detailpengaduan');
            })->name('user.detailpengaduan');

        });
    });