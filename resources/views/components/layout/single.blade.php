<!-- コンテナ用として作ったものの、これ必要だっただろうか？　そもそも、コンテナの必要とされる箇所が、フォーム投稿部　ツイート編集部くらいなので　追記したほうがわかり易い？　統合候補　想定tweet/index.blade.php とtweet/update.blade.php　 -->
<div class="flex justify-center">
    <div class="max-w-screen-sm w-full">
        {{ $slot }}
    </div>
    
</div>