<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/forgot',[HomeController::class,'forgot'])->name('home.forgot');
Route::get('/register',[HomeController::class,'register'])->name('home.register');
Route::post('/login',[HomeController::class,'login'])->name('home.login');
Route::post('/register_data',[HomeController::class,'register_data'])->name('home.register_data');
