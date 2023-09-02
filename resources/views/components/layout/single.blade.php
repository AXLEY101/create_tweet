<!-- コンテナ用として作ったものの、これ必要だっただろうか？　そもそも、コンテナの必要とされる箇所が、フォーム投稿部　ツイート編集部くらいなので　追記したほうがわかり易い？　統合候補　想定tweet/index.blade.php とtweet/update.blade.php　 -->
<div class="flex justify-center">
    <div class="max-w-screen-sm w-full">
        @auth
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <div class="flex justify-end p-4">
                    <button class="mt-2 text-sm text-gray-500 hover:text-gray-800" onclick="event.preventDefault(); this.closest('form').submit();">
                        ログアウト
                    </button>
                </div>
                
            </form>
        
        @endauth
        
        
        {{ $slot }}
    </div>
    
</div>