<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SiteController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
Route::get('err',[AuthController::class, 'err'])->name('login');
Route::get('logout',[AuthController::class, 'logout']);

Route::resource('contact',SiteController::class);

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('product', ProductController::class);
});
