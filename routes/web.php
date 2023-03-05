<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


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

Route::get('/',[HomeController::class,'index']);
Route::get('/create',[UserController::class,'create']);
Route::post('/create',[UserController::class,'store']);
Route::post('/login',[UserController::class,'user_logged']);
Route::get('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);

Route::get('/account',[UserController::class,'account']);







