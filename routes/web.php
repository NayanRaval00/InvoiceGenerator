<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    /**Warehouse creation */

    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/{id}', [InvoiceController::class, 'view'])->name('invoice.view'); // Fixed naming inconsistency
    Route::get('/invoice/{id}/pdf', [InvoiceController::class, 'generatePdf'])->name('invoice.pdf'); // Added missing PDF route
    Route::get('show-pdf',function () {
        return view('invoice.pdf2');
    });
});

/** User Authentication */
Route::get('/login', [UserAuthController::class, 'login'])->name('admin-login');
Route::post('/user-login', [UserAuthController::class, 'userLogin'])->name('custom.login.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
