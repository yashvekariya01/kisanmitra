<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LegacyController;

Route::get('/', [LegacyController::class, 'index']);
Route::get('/login', [LegacyController::class, 'showLogin'])->name('login');
Route::post('/login', [LegacyController::class, 'login']);
Route::get('/register', [LegacyController::class, 'showRegister'])->name('register');
Route::post('/register', [LegacyController::class, 'register']);
Route::get('/logout', [LegacyController::class, 'logout'])->name('logout');

Route::get('/farmer', [LegacyController::class, 'farmerDashboard'])->name('farmer.dashboard');
Route::post('/farmer', [LegacyController::class, 'addCrop'])->name('farmer.add_crop');

Route::get('/buyer', [LegacyController::class, 'buyerDashboard'])->name('buyer.dashboard');

Route::get('/apmc', [LegacyController::class, 'apmcMembers'])->name('apmc');
Route::post('/apmc', [LegacyController::class, 'apmcMembers']);

Route::get('/buy-crop', [LegacyController::class, 'buyCropPage'])->name('buy_crop');
Route::post('/buy-crop', [LegacyController::class, 'buyCropAction'])->name('buy_crop.action');

Route::get('/contact', [LegacyController::class, 'contact'])->name('contact');
Route::post('/contact', [LegacyController::class, 'contact']);

Route::get('/landing', [LegacyController::class, 'landing'])->name('landing');
Route::get('/orders', [LegacyController::class, 'orders'])->name('orders');
