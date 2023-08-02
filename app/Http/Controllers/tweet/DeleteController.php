<?php

namespace App\Http\Controllers\tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class DeleteController extends Controller
{
    //
    public function tweet_delete(Request $request){
        $tweetId = (int) $request->route('tweetId');
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();
        $tweet->delete();
        return redirect()
                ->route('tweet.index')
                ->with('feedback.success', "つぶやきを削除しました");
    }
}
