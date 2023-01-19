<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;

Route::get('/', [QrController::class, 'index'])->name('qrcode.index');
Route::post('qr/create', [QrController::class, 'create'])->name('qrcode.create');
