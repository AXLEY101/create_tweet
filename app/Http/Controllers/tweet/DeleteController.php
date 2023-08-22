<?php

namespace App\Http\Controllers\tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

//　自分のツイートか確認するための追加したサービスクラス
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class DeleteController extends Controller
{
    //
    public function tweet_delete(Request $request, TweetService $tweetService){
        $tweetId = (int) $request->route('tweetId');
        //ツイートのIDとリクエストのユーザーIDが一致するか確認　checkOwnTweet()で確認し違ったらfalseが返る。falseなら403エラー画面に遷移
        if(!$tweetService->checkOwnTweet($request->user()->id, $tweetId)){
            throw new AccessDeniedHttpException();
        }
        
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        $tweet->delete();
        return redirect()
                ->route('tweet.index')
                ->with('feedback.success', "つぶやきを削除しました");
    }
}
