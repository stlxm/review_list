<!doctype html>
<html lang="ja">
<header>
    <div class="header-right">
        <button onclick="location.href='/stafflogin'" class="link login">スタッフログイン</button>
    </div>
</header>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン画面</title>
</head>
<style>
/* スタイルの追加 */
.link {
    display: inline-block;
    height: 35px;
    width: 130px;
}

.login {
    /*--  ログイン--*/
    margin-left: 20px;
    background-color: white;
    float: right;
}
</style>

<body>
    <h1>ログイン画面</h1>
    <form action="" method="post">
        @csrf
        <label for="email">メールアドレス</label>
        <input type="email" name="email" id="email">
        <label for="password">パスワード</label>
        <input type="password" name="password" id="password">
        <button type="submit">送信</button>
    </form>

    <a href='/register'>新規登録</a>

    <a href='/toppage'>TOP PAGEへ</a>

</body>

</html>