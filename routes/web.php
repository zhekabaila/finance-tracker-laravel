<?php

use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FinanceController::class, 'index'])->name('home');
Route::get('/create', [FinanceController::class, 'create'])->name('create');
Route::post('/store', [FinanceController::class, 'store'])->name('store');
