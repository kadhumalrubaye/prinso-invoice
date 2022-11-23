<?php

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
    return view('welcome', ['invoices' => Invoice::all()]);
});
Route::get('invoice', function () {
    return view('invoice', ['invoices' => Invoice::all()]);
});
Route::get('delivery', function () {
    return view('delivery', ['deliveries' => DeliveryAgency::all()]);
});
Route::get('item', function () {
    return view('item', ['items' => Item::all()]);
});
Route::get('customer', function () {
    return view('customer', ['customers' => Customer::all()]);
});
