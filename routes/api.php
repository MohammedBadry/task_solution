<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Accounts\RegisterController;

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
Route::prefix('v1')->group(function () {
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/account', [RegisterController::class, 'account'])->name('account');
    Route::get('/location', [RegisterController::class, 'location'])->name('location');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
