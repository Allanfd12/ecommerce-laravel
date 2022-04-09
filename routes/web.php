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
Route::get('/product/{slug}',[\App\Http\Livewire\ProductComponent::class, '__invoke'])->name('product.detail');

// grupo de rotas de usuários autenticados
/*Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
//autenticação normal
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/user/dashboard', [\App\Http\Livewire\User\UserDashboardComponent::class, '__invoke'])->name('user.dashboard');

});
//autenticação para admins
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authAdmin'])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Livewire\Admin\AdminDashboardComponent::class, '__invoke'])->name('admin.dashboard');
});