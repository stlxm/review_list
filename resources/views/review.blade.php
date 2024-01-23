<!DOCTYPE html>
<html>
  <head>
    <title>{{ $book ->title }}</title>
    <meta charset="UTF-8" />
  </head>
  <body>
    <h1>{{ $book -> title }}</h1>
    <h2>{{ $book -> writer }}</h2>
    <img src="{{ asset('images/' . $isbn . '.png') }}" alt="{{ $book -> title }}">
    </a>
    <form method="get" action="{{ route('review.sort', ['isbn' => $isbn]) }}">
  <label for="sortColumn"><b>並べ替え</b></label>
  <select name="sortColumn" id="sortColumn">
  <option value="created_at" @isset($sortColumn) {{ $sortColumn === 'created_at' ? 'selected' : '' }} @endisset>日付順</option>
    <option value="review_star" @isset($sortColumn) {{ $sortColumn === 'review_star' ? 'selected' : '' }} @endisset>評価順</option>
  </select>
  <button type="submit">適用</button>
</form>

<button onclick="location.href='/chart/{{ $isbn }}'">グラフを表示</button>

@if(count($reviews) > 0)
      <table border="1">
        <tr>
          <th>レビュー内容</th>
          <th>評価</th>
          <th>作成日時</th>
        </tr>
        @foreach($reviews as $record)
          <tr>
            <th>{{ $record->review_text }}</th>
            <th>{{ $record->review_star }}</th>
            <th>{{ $record->created_at }}</th>
          </tr>
        @endforeach
      </table>
    @else
      <p>レビューがありません。</p>
    @endif

<button onclick="location.href='/input/{{ $isbn }}'">レビューをする</button>
<a href='/toppage'>TOP PAGEへ</a>
  </body>
</html>
