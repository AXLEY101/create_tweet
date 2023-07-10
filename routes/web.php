<?php

use Illuminate\Support\Facades\Route;
//テスト
use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\tweet\IndexController;
use App\Http\Controllers\tweet\CreateController;

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

Route::get('/tweet',[IndexController::class, 'showId'])->name('tweet.index');
Route::post('/tweet/create',[CreateController::class, 'tweet_create'])->name('tweet.create');


//テスト用
Route::get('/',[WelcomeController::class, 'welcome']);
