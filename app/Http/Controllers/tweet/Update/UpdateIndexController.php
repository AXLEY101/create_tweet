<?php

namespace App\Http\Controllers\tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateIndexController extends Controller
{
    //
    public function tweet_update_index(Request $request){
        $tweetId = (int) $request->route('tweetId');
        //全文書くと↓になるが、今回はfirstOrFailを使ってみる
        // $tweet = Tweet::where('id', $tweetId)->first();
        // if(is_null($tweet)){
        //     throw new NotFoundHttpException('存在しないつぶやきです');
        //}
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        
        dd($tweet);
    }
    
}
