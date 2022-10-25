<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\SuccessController;


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

Route::group(['middleware' => ['customGuest']], function () {
    Route::get('/', [SecurityController::class, 'index']);
    Route::post('/login', [SecurityController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['customAuth']], function () {
    Route::get('/', [SuccessController::class, 'index']);
    Route::get('/logout', [SecurityController::class, 'logout'])->name('logout');
});