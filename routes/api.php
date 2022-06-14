<?php

use App\Http\Controllers\Api\Admin\CategoryController as CategoryController;
use App\Http\Controllers\Auth\Api\LoginController as LoginController;
use App\Http\Controllers\Auth\Api\RegisterController as RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum', 'authAdmin')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('/categories', CategoryController::class);

});

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class,'login'])->name('api.login');
    Route::post('/token', [LoginController::class,'token'])->name('api.login');
    Route::post('/register', [RegisterController::class,'register'])->name('api.register');
    Route::post('/logout', [LoginController::class,'logout'])->name('api.logout');

});

