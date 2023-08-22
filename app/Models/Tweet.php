<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    // モデルとテーブルの名前が小文字で単語間を＿でつなぐ＋複数形のテーブルがマッピングされる　下記マッピング対象外のテーブルに書き込む際の紐づけ
    // prptected $table = 'tweet';//←が紐づけで必要 基本テーブルとモデルは一対だけど、書けるよう記憶しておくこと。
    
    // プライマリキーがauto incrementではない場合、よくあるUUIDを利用するケースは下記を書きauto incrementじゃないことを宣言する
    // public $incrementing = false;
    
    // プライマリキーが整数じゃない時
    // protected $keyType = 'string';
    
    // Eloquesntモデルで複合主キーはサポートしてない事も注意。　もしも書くなら、別のユニークキーとなるカラムを追加などが必要
    
    // created_at updated_atの無効化
    // public $timestamps = false;
    
    // 対応するカラム指定
    // const CREATED_AT = 'creation_data';
    // const UPDATED_AT = 'updated_data';
    
    public function user(){
        //Userモデルへの関連付け
        //このメソッドは、TweetモデルがUserモデルに属していることを示す。belongsToメソッドは「多対1」のリレーションを定義するためのもの。
        return $this->belongsTo(User::class);
    }
    
}
