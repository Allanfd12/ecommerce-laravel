<?php

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

Route::get('/',[\App\Http\Livewire\HomeComponent::class, '__invoke'])->name('home');
Route::get('/shop',[\App\Http\Livewire\ShopComponent::class, '__invoke'])->name('shop');
Route::get('/cart',[\App\Http\Livewire\CartComponent::class, '__invoke'])->name('cart');
Route::get('/checkout',[\App\Http\Livewire\CheckoutComponent::class, '__invoke'])->name('checkout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
