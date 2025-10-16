<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DonationController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Halaman Proyek
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Proses Donasi
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
Route::get('/donations/{donation}/checkout', [DonationController::class, 'checkout'])->name('donations.checkout');
Route::get('/donations/{donation}/instructions', [DonationController::class, 'instructions'])->name('donations.instructions');
Route::post('/donations/{donation}/upload-proof', [DonationController::class, 'uploadProof'])->name('donations.uploadProof');

// Webhook untuk Notifikasi Pembayaran (dari Midtrans)
// Pastikan untuk menambahkan route ini ke dalam array 'except' di VerifyCsrfToken middleware
Route::post('/midtrans/webhook', [DonationController::class, 'handleWebhook'])->name('midtrans.webhook');
