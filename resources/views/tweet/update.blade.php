<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>つぶやきアプリ</title>
    </head>
    <body>
        @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif
        
        <h1>つぶやきを編集する</h1>
        <div>
            <a href="{{ route('tweet.index') }}">戻る</a>
            <p>投稿フォーム</p>
            @if (session('feedback.success'))
                <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id])}}" method="post">
                @method('PUT')
                @csrf
                <label for="tweet-content">つぶやき</label>
                    <span>１４０文字まで</span><br>
                    <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力">{{ $tweet->content }}</textarea><br>
                    @error('tweet')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                <button type="submit">編集</button>
            </form>
            <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">削除</button>
            </form>
        </div>
        
    </body>
</html>