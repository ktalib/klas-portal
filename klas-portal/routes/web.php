<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LegalSearchController;

// Display the legal search form
Route::get('/legal-search', [LegalSearchController::class, 'index'])->name('legal-search.index');

// Process the search by file number
Route::post('/legal-search/search', [LegalSearchController::class, 'search'])->name('legal-search.search');

// Display the payment page
Route::get('/legal-search/payment', [LegalSearchController::class, 'payment'])->name('legal-search.payment');

// Process the payment
Route::post('/legal-search/process-payment', [LegalSearchController::class, 'processPayment'])->name('legal-search.process-payment');

// Display the search report
Route::get('/legal-search/report/{id}', [LegalSearchController::class, 'report'])->name('legal-search.report');