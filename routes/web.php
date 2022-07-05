<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'view'])
        ->name('dashboard');

    Route::get('/invoices/create', [InvoiceController::class, 'create'])
        ->name('invoices.create');

    Route::post('/invoices', [InvoiceController::class, 'store'])
        ->name('invoices.store');

    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])
        ->name('invoices.destroy');

    Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])
        ->name('invoices.edit');

    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])
        ->name('invoices.update');
});

require __DIR__.'/auth.php';
