<?php
declare(strict_types=1);
namespace App\Http\Controllers\tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    
    
    public function showId(){
        // return view('tweet.index',['name' => 'ユーザーねーむ']);
        // return view('tweet.index')->with('name','ユーザーねーむ');//こっちでも同じように呼べ
        
        //チェーンメソッドで複数もいける。
        // return view('tweet.index')
        //                 ->with('name', 'ユーザーねーむ');
        //                 ->with('age', '30');
        
        $tweets = Tweet::orderBy('created_at','DESC')->get();
        
        return view('tweet.index',['tweets' => $tweets]);
    }
}
