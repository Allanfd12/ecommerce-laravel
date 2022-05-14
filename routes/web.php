<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Livewire\HomeComponent as HomeComponent;
use \App\Http\Livewire\ShopComponent as ShopComponent;
use \App\Http\Livewire\CartComponent as CartComponent;
use \App\Http\Livewire\CheckoutComponent as CheckoutComponent;
use \App\Http\Livewire\ProductComponent as ProductComponent;
use \App\Http\Livewire\CategoryComponent as CategoryComponent;
use \App\Http\Livewire\SearchComponent as SearchComponent;
use \App\Http\Livewire\User\UserDashboardComponent as UserDashboardComponent;
use \App\Http\Livewire\Admin\AdminDashboardComponent as AdminDashboardComponent;
use \App\Http\Livewire\Admin\Category\ListCategoryComponent as ListCategoryComponent;
use \App\Http\Livewire\Admin\Category\AddCategoryComponent as AddCategoryComponent;
use \App\Http\Livewire\Admin\Category\EditCategoryComponent as EditCategoryComponent;


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

Route::get('/',HomeComponent::class)->name('home');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartComponent::class)->name('cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}',ProductComponent::class)->name('product.detail');
Route::get('/category/{slug}',CategoryComponent::class)->name('category.detail');
Route::get('/search',SearchComponent::class)->name('search');




//autenticação normal
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');

});


//autenticação para admins
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'authAdmin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/category',ListCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/category/edit/{slug}',EditCategoryComponent::class)->name('admin.category.edit');
});