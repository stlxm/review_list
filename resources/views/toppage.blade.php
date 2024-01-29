<!DOCTYPE html>
<header>
<div class="header-right">
	<div class="entry-wrapper">
			<a href="/login" class="link login">ログイン</a>
			<a href="/register" class="link sign-up">新規登録</a>
	</div>
</div>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>中田島砂丘書店 海支店 HP</title>
    <style>
        /* スタイルの追加 */
        .link{
            display: inline-block;
	height:35px;
	width:180px;
}

.sign-up{   /*--  新規登録--*/
	margin-left:20px;
	background-color:white;
	float:right;
}

.login{    /*--  ログイン--*/
	margin-left:20px;
	background-color:white;
    float:right;
}

        .book-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .book-image {
            max-width: 100px; /* 画像の最大幅を指定 */
            margin-right: 20px; /* 画像とテキストの間に余白を指定 */
        }

        .book-details {
            flex: 1; /* 右側に残りのスペースを使うように指定 */
        }
    </style>
</head>
<body>

    <h1>中田島砂丘書店 海支店 HP</h1>

    <ul>
        @foreach($books as $book)
            <br>
                <div class="book-container">
                    <!-- 画像をリンクに変更 -->
                    <a href='/review/{{ $book -> isbn }}'>
                        <img class="book-image" src="{{ asset('images/' . $book -> isbn . '.png') }}" alt="{{ $book->title }}">
                    </a>

                    <!-- タイトルと作者名 -->
                    <div class="book-details">
                        <h2>{{ $book->title }}</h2>
                        <p>著者: {{ $book->writer }}</p>
                        <!-- 他の情報も表示できるようにする -->
                    </div>
                </div>
            </br>
        @endforeach
    </ul>

</body>
</html>
