<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- 今回vite使用のため、下記のlink href=""とscript src="" はデフォルトでキャッシュバスティングされている。 mixとの違いに注意 -->
        <link href="/css/app.css" rel="stylesheet">
        <script src="/js/app.js" async defer></script>
        <!-- async　defer　両方記述したのは、古いブラウザでは片方しか対応していない時、対応できるため。　両方認識できる場合はasyncが優先されることにも注意。 -->
        <!-- asyncの挙動 スクリプトは非同期的にダウンロードされます。これは、HTMLのパースが一時停止されることなく、スクリプトがバックグラウンドでダウンロードされることを意味する -->
        <!-- deferの挙動 スクリプトも非同期的にダウンロードされますが、HTMLのパースが完了するまでスクリプトの実行は待機されます -->
        <!-- 複数ある場合にどちらも挙動が違う事にも注意。-->
        <!-- asyncが複数ある場合。　複数のasyncスクリプトがある場合、最初にダウンロードが完了したスクリプトが最初に実行される。 　つまり、実行順序は保証されない。-->
        <!-- deferが複数ある場合。　複数のdeferスクリプトがある場合、スクリプトはその出現順に実行されます。これは、スクリプトの実行順序が保証されることを意味する -->
        
        
        <!-- 今回はLaravel８からのコンポーネントを利用。　下記の$titleは「props」と呼ばれているらしい -->
        <title>{{ $title ?? 'つぶやいとる' }}</title>
    </head>
    <body class="bg-gray-50">
        <!-- $slot　がコンポーネントを利用する側がタグに挟んだ要素を入れ込む事ができる領域になる。 継承の＠が変数に変わっただけかも？ -->
        {{ $slot }}
    </body>
</html>