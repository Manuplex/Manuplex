<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\AnalyticsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichfe
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/Registration',[PrizeController::class, 'rapport']) -> name('myrapport');

Route::post('/finishup',[PrizeController::Class,'create'])->name('register');

Route::get('/',[PrizeController::class,'index']);
