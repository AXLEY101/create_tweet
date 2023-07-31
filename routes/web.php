<?php

use Illuminate\Support\Facades\Route;
//テスト
use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\tweet\IndexController;
use App\Http\Controllers\tweet\CreateController;
use App\Http\Controllers\tweet\Update\UpdateIndexController;
use App\Http\Controllers\tweet\Update\PutController;

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
Route::get('/tweet/update/{tweetId}', [UpdateIndexController::class, 'tweet_update_index'])->name('tweet.update.index')->where('tweetId','[0-9]+');//URLパラメータルールとして整数のみ許可
Route::put('/tweet/update/{tweetId}', [PutController::class, 'tweet_update_put'])->name('tweet.update.put')->where('tweetId','[0-9]+');


//テスト用
Route::get('/',[WelcomeController::class, 'welcome']);
