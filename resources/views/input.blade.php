<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // フォームが送信される前に実行される処理
            $("form").submit(function(e) {
                // ラジオボタンが選択されているかを確認
                if (!$("input[name='review_star']:checked").val()) {
                    // 選択されていない場合はエラーメッセージを表示
                    alert("レビュー評価を選択してください。");
                    // フォームの送信を中止
                    e.preventDefault();
                }

                // レビュー内容が入力されているかを確認
                var reviewText = $("textarea[name='review_text']").val();
                if (!reviewText.trim()) {
                    // 入力されていない場合はエラーメッセージを表示
                    alert("レビュー内容を入力してください。");
                    // フォームの送信を中止
                    e.preventDefault();
                }
            });
        });

    </script>
</head>
<body>
<h1>レビュー</h1>
    <!-- ISBNに対応する本の情報があれば表示 -->
    @if($book)
        <h2>{{ $book->title }}</h2>
    @endif

<form method="post" action="{{ url('/add/' . $isbn) }}">
@csrf
    レビュー評価をしてください。<br>

      <!--裏でISBNを登録-->
  <!--{{ $isbn}}を登録します。-->
  <input type="hidden" name="isbn" value="{{ $isbn }}">

    <input type="radio" name="review_star" value="★☆☆☆☆">★☆☆☆☆
    <input type="radio" name="review_star" value="★★☆☆☆">★★☆☆☆
    <input type="radio" name="review_star" value="★★★☆☆">★★★☆☆
    <input type="radio" name="review_star" value="★★★★☆">★★★★☆
    <input type="radio" name="review_star" value="★★★★★">★★★★★
  </br>



    <br>
    <textarea name="review_text" placeholder="レビュー内容を入力してください"></textarea>
  </br>
    <br>
    <input type="submit" value="レビューを送信">
  </br>
  </form>
</body>
