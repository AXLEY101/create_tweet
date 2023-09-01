
        
        <!-- 今回はLaravel８からのコンポーネントを利用したlayoutを利用。　アドレスは/resources/views/components/layout.blade.php になるので注意。　感覚としては継承と似てるがlayoutを置いておく場所が全然場所違うので注意 -->
        <x-layout title="TOP | つぶやいたー">
                @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
            
            <!-- layoutでsingle.blade.php作ったものの、このままのほうが汎用性高いため、このまま記載 -->
            
            <h1>つぶやいたー</h1>
            @if(session('feedback.success'))
                <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            <!-- レイアウトコンポーネントのtweet.form.postに auth  endauth　でログイン時記載処理いれてるので変更時はそちらを参照-->
            <x-tweet.form.post></x-tweet.form.post>
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
