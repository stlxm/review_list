<!DOCTYPE html>
<html>
<header>
    @guest
    <div class="header-right">
        <button onclick="location.href='/register'" class="link sign-up">新規登録</button>
        <button onclick="location.href='/login'" class="link login">ログイン</button>
    </div>
    @endguest

    @auth
    <div class="header-right">
        <form action="{{route('user.logout')}}" method="post">
            @csrf
            <button class="link logout">ログアウト</button>
        </form>
        <p class="namelink loginname">{{\Illuminate\Support\Facades\Auth::user()->name}}でログインしています。</p>

    </div>
    @endauth
</header>

<head>
    <title>{{ $book ->title }}</title>
    <meta charset=" UTF-8" />
    <style>
    /* スタイルの追加 */
    .link {
        display: inline-block;
        height: 35px;
        width: 100px;
    }

    .namelink {
        display: inline-block;
        height: 20px;
        width: 220px;
    }


    .loginname {
        /*--  ログインネーム--*/
        margin-left: 20px;
        float: right;
    }

    .sign-up {
        /*--  新規登録--*/
        margin-left: 20px;
        background-color: white;
        float: right;
    }

    .login {
        /*--  ログイン--*/
        margin-left: 20px;
        background-color: white;
        float: right;
    }

    .logout {
        /*--  ログアウト--*/
        margin-left: 20px;
        background-color: white;
        float: right;
    }
    </style>
</head>

<body>
    <h1>{{ $book -> title }}</h1>
    <h2>{{ $book -> writer }}</h2>
    <img src="{{ asset('images/' . $isbn . '.png') }}" alt="{{ $book -> title }}">
    </a>
    <form method="get" action="{{ route('review.sort', ['isbn' => $isbn]) }}">
        <label for="sortColumn"><b>並べ替え</b></label>
        <select name="sortColumn" id="sortColumn">
            <option value="created_at" @isset($sortColumn) {{ $sortColumn === 'created_at' ? 'selected' : '' }}
                @endisset>日付順</option>
            <option value="review_star" @isset($sortColumn) {{ $sortColumn === 'review_star' ? 'selected' : '' }}
                @endisset>評価順</option>
        </select>
        <button type="submit">適用</button>
    </form>

    <button onclick="location.href='/chart/{{ $isbn }}'">グラフを表示</button>

    @if(count($reviews) > 0)
    <table border="1">
        <tr>
            <th>ユーザーID</th>
            <th>レビュー内容</th>
            <th>評価</th>
            <th>作成日時</th>
        </tr>
        @foreach($reviews as $record)
        <th>
            <a style="width:100%; height:100%; display:block;" href="/user/{{ $record -> user_id }}">
                {{ $record->user_id }}
            </a>
        </th>
        <th>{{ $record->review_text }}</th>
        <th>{{ $record->review_star }}</th>
        <th>{{ $record->created_at }}</th>
        </tr>
        @endforeach
    </table>
    @else
    <p>レビューがありません。</p>
    @endif
    @guest
    <button onclick="location.href='/login'">ログインをしてレビューを投稿</button>
    @endguest
    @auth
    <button onclick="location.href='/input/{{ $isbn }}'">レビューをする</button>
    @endauth
    <a href='/toppage'>TOP PAGEへ</a>
</body>

</html>