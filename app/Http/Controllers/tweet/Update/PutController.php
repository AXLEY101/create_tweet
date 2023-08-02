<?php

namespace App\Http\Controllers\tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;

class PutController extends Controller
{
    public function tweet_update_put(UpdateRequest $request){
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
                ->route('tweet.update.index', ['tweetId' => $tweet->id])
                ->with('feedback.success', "つぶやきを編集しました");
    }
    
    //
}