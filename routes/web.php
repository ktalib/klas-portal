<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalSearchController;
use App\Http\Controllers\WebmapController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;

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

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Services routes
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/first-registration', [ServiceController::class, 'firstRegistration'])->name('services.first-registration');
Route::get('/services/regularization', [ServiceController::class, 'regularization'])->name('services.regularization');
Route::get('/services/recertification', [ServiceController::class, 'recertification'])->name('services.recertification');
Route::get('/services/fresh-allocation', [ServiceController::class, 'freshAllocation'])->name('services.fresh-allocation');
Route::get('/services/forms', [ServiceController::class, 'forms'])->name('services.forms');
Route::get('/services/fees', [ServiceController::class, 'fees'])->name('services.fees');

// Legal Search routes
Route::get('legal-search', [LegalSearchController::class, 'index'])->name('legal-search');
Route::post('legal-search/search', [LegalSearchController::class, 'search'])->name('legal-search.search');
Route::post('legal-search/advanced-search', [LegalSearchController::class, 'advancedSearch'])->name('legal-search.advanced-search');
Route::get('legal-search/payment', [LegalSearchController::class, 'payment'])->name('legal-search.payment');
Route::post('legal-search/process-payment', [LegalSearchController::class, 'processPayment'])->name('legal-search.process-payment');
Route::get('legal-search/results', [LegalSearchController::class, 'results'])->name('legal-search.results');
Route::get('legal-search/report', [LegalSearchController::class, 'report'])->name('legal-search.report');
Route::get('/legal-search/report/{id}', [LegalSearchController::class, 'report'])->name('legal-search.report');
Route::get('/legal-search/report/{id}', [LegalSearchController::class, 'report'])->name('legal-search.report');

// Webmap routes
Route::get('/webmap', [WebmapController::class, 'index'])->name('webmap');

// Authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';