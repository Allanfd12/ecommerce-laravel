<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Livewire\HomeComponent as HomeComponent;
use \App\Http\Livewire\ShopComponent as ShopComponent;
use \App\Http\Livewire\CartComponent as CartComponent;
use \App\Http\Livewire\CheckoutComponent as CheckoutComponent;
use \App\Http\Livewire\ProductComponent as ProductComponent;
use \App\Http\Livewire\CategoryComponent as CategoryComponent;
use \App\Http\Livewire\User\UserDashboardComponent as UserDashboardComponent;
use \App\Http\Livewire\Admin\AdminDashboardComponent as AdminDashboardComponent;

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

Route::get('/',[HomeComponent::class, '__invoke'])->name('home');
Route::get('/shop',[ShopComponent::class, '__invoke'])->name('shop');
Route::get('/cart',[CartComponent::class, '__invoke'])->name('cart');
Route::get('/checkout',[CheckoutComponent::class, '__invoke'])->name('checkout');
Route::get('/product/{slug}',[ProductComponent::class, '__invoke'])->name('product.detail');
Route::get('/category/{slug}',[CategoryComponent::class, '__invoke'])->name('category.detail');

// grupo de rotas de usuários autenticados
/*Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
//autenticação normal
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardComponent::class, '__invoke'])->name('user.dashboard');

});
//autenticação para admins
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardComponent::class, '__invoke'])->name('admin.dashboard');
});