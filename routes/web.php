<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportCsvController;
use App\Http\Controllers\ProductController; // Add this line
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/import', [ImportCsvController::class, 'import'])->name('import');
Route::post('/import', [ImportCsvController::class, 'importcsv'])->name('importcsv');

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::post('/', [ProductController::class, 'getProductPrice'])->name('get-product-price');
