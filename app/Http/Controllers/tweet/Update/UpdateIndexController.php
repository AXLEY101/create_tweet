<?php

namespace App\Http\Controllers\tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//　自分のツイートか確認するための追加したサービスクラス
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateIndexController extends Controller
{
    //
    public function tweet_update_index(Request $request, TweetService $tweetService){
        $tweetId = (int) $request->route('tweetId');
        // ↓でユーザーが特定のツイートの所有者であるかどうかを確認し、もし所有者でない場合にはエラーを投げる。
        // checkOwnTweetは所有者が一致すればTrue　一致しなければfalseで返る
        if(!$tweetService->checkOwnTweet($request->user()->id, $tweetId )){
            // AccessDeniedHttpExceptionは HTTPの403 Forbiddenエラーを示す例外クラス。 これで４０３画面になるはず
            throw new AccessDeniedHttpException();
        }
        //全文書くと↓になるが、今回はfirstOrFailを使ってみる
        // $tweet = Tweet::where('id', $tweetId)->first();
        // if(is_null($tweet)){
        //     throw new NotFoundHttpException('存在しないつぶやきです');
        //}
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        
        return view('tweet.update')->with('tweet',$tweet);
        
    }
    
}
