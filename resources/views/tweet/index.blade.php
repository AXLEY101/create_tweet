<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>つぶやいたー</title>
    </head>
    <body>
        <h1>つぶやいたー</h1>
        <div>
            @foreach($tweets as $tweet)
                <p>{{ $tweet->id }}</p>
                <p>{{ $tweet->content }}</p>
                <p>{{ $tweet->created_at }}</p>
                <p>{{ $tweet->updated_at }}</p>
            @endforeach
        </div>
    </body>
</html>