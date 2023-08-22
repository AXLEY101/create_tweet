<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;

use App\Http\Controllers\tweet\IndexController;
use App\Http\Controllers\tweet\CreateController;
use App\Http\Controllers\tweet\Update\UpdateIndexController;
use App\Http\Controllers\tweet\Update\PutController;
use App\Http\Controllers\tweet\DeleteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//実働部 今回はLaravel Breezeを利用してみた。　auth.phpにルーティングされているのでそちらも参照
Route::get('/tweet',[IndexController::class, 'showId'])->name('tweet.index');

Route::middleware('auth')->group(function () {
    Route::post('/tweet/create',[CreateController::class, 'tweet_create'])->name('tweet.create');
    Route::get('/tweet/update/{tweetId}', [UpdateIndexController::class, 'tweet_update_index'])->name('tweet.update.index')->where('tweetId','[0-9]+');//URLパラメータルールとして整数のみ許可
    Route::put('/tweet/update/{tweetId}', [PutController::class, 'tweet_update_put'])->name('tweet.update.put')->where('tweetId','[0-9]+');
    Route::delete('/tweet/delete/{tweetId}', [DeleteController::class, 'tweet_delete'])->name('tweet.delete');
});








//テスト用
Route::get('/',[WelcomeController::class, 'welcome']);









require __DIR__.'/auth.php';
