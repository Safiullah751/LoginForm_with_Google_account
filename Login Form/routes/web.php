<?php

use App\Http\Controllers\AuthController;
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

Route::view('/', 'auth.index')->name('login');
Route::view('/sign_up' , 'auth.sign_up')->name('sign_up');
Route::post('/sign_up' ,[AuthController::class ,'register']);
Route::post('/' ,[ AuthController::class ,'login']);
Route::view('/home', 'auth.Home')->name('home');

use App\Http\Controllers\Auth\GoogleController;

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

