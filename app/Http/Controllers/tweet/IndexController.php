<?php
declare(strict_types=1);
namespace App\Http\Controllers\tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;


class IndexController extends Controller
{
    
    
    public function showId(Request $request, TweetService $tweetService){
        // return view('tweet.index',['name' => 'ユーザーねーむ']);
        // return view('tweet.index')->with('name','ユーザーねーむ');//こっちでも同じように呼べ
        
        //チェーンメソッドで複数もいける。
        // return view('tweet.index')
        //                 ->with('name', 'ユーザーねーむ');
        //                 ->with('age', '30');
        
        
        // $tweets = Tweet::orderBy('created_at','DESC')->get();
        
        // return Tweet::orderBy('created_at' , 'DESC')->get();　左 getTweets()で呼び出されてる処理
        // つぶやきの一覧を取得 showId(TweetService $tweetService)の記述で、Laravelのサービスコンテナが動きTweetServiceのインスタンスは作成されてるので突っ込む。
        $tweets = $tweetService->getTweets();
        
        return view('tweet.index',['tweets' => $tweets]);
    }
}
