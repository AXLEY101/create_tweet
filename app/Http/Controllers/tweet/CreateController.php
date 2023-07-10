<?php
declare(strict_types=1);
namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;

class CreateController extends Controller
{
    //
    public function tweet_create(CreateRequest $request){
        //
        // $validatedData = $request->validated();を使ってバリデーションしたデータを取り出していたが、今回
        
        // ModelのTweetクラスで新しいインスタンス作成し
        $tweet = new Tweet;
        // contentにフォームリクエストで書いたtweet()で返された内容を入れ
        $tweet->content = $request->tweet();
        // Modelで使用できるsave()で内容を書き込み
        $tweet->save();
        return redirect()->route('tweet.index');
    }
    
}
