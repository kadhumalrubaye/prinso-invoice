<?php

use App\Http\Controllers\ProfileController;
use App\Models\Customer;
use App\Models\DeliveryAgency;
use App\Models\Invoice;
use App\Models\Item;
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
Route::get('/invoice', function () {
    return view('invoice', ['invoices' => Invoice::all()]);
});
Route::get('/item', function () {
    return view('item', ['items' => Item::all()]);
});
Route::get('/customer', function () {
    return view('customer', ['customers' => Customer::all()]);
});
Route::get('/delivery', function () {
    return view('delivery', ['delivery' => DeliveryAgency::all()]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
