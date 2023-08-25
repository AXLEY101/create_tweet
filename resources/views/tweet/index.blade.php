
        
        <!-- 今回はLaravel８からのコンポーネントを利用したlayoutを利用。　アドレスは/resources/views/components/layout.blade.php になるので注意。　感覚としては継承と似てるがlayoutを置いておく場所が全然場所違うので注意 -->
        <x-layout title="TOP | つぶやいたー">
                @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
            
            
            
            <h1>つぶやいたー</h1>
            @if(session('feedback.success'))
                <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            @auth
                <div>
                    <p>投稿フォーム</p>
                    <form action="/tweet/create" method="post">
                        @csrf
                        <label for="tweet-content">つぶやき</label>
                            <span>１４０文字まで</span><br>
                            <textarea id="tweet-content" type="text" name="tweet" placeholder="つぶやきを入力"></textarea><br>
                        <button type="submit">投稿</button>
                    </form>
                </div>
            @endauth
            <div>
            @foreach($tweets as $tweet)
                <details>
                    <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
                    @if(\Illuminate\Support\Facades\Auth::id() === $tweet->user_id)
                    <div>
                        <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                    </div>
                    @else
                        編集できません。
                    @endif
                </details>
            @endforeach   
            </div>
        </x-layout>
