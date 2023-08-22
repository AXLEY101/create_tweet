<?php

namespace App\Http\Controllers\tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;

//　自分のツイートか確認するための追加したサービスクラス
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    public function tweet_update_put(UpdateRequest $request, TweetService $tweetService){
        
        //ユーザーIDとリクエストしたユーザーIDが同じか確認。　 違ってればfalseが返り、４０３エラー画面にする
        if(!$tweetService->checkOwnTweet($request->user()->id, $request->id())){
            throw new AccessDeniedHttpException();
        }
        
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
                ->route('tweet.update.index', ['tweetId' => $tweet->id])
                ->with('feedback.success', "つぶやきを編集しました");
    }
    
    //
}