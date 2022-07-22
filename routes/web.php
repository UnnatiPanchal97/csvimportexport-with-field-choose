<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;

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

Auth::routes();

Route::get('/home', [CustomerController::class, 'index'])->name('customers.index');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/import_parse', [CustomerController::class, 'parseImport'])->name('import_parse');
Route::post('/import_process', [CustomerController::class, 'processImport'])->name('import_process');
Route::get('/export-excel', [CustomerController::class,'exportIntoExcel'])->name('customer.excel');
Route::get('/export-csv', [CustomerController::class,'exportIntoCSV'])->name('customer.csv');
