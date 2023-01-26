<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryAgencyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\ReportAController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('customers', CustomerController::class);

//customers.show
Route::get('/items', [ItemController::class]);
Route::resource('items', ItemController::class);
Route::get('/profits/filterdata', [ProfitController::class, 'filterData'])->name('profits.filterData');
Route::resource('profits', ProfitController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('deliveries', DeliveryAgencyController::class);
Route::resource('reporta', ReportAController::class);

require __DIR__ . '/auth.php';
