<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
//use Carbon\Carbon;

class InputController extends Controller
{
    public function input($isbn = null)
    {
        // ISBNに対応する本の情報を取得
        $book = Book::where('isbn', $isbn)->first();

        // フォームにデフォルトのISBNを渡してビューを表示
        return view('input', compact('book', 'isbn'));
    }

    public function add(Request $request, $isbn = null)
    {

        $post = new Review();
        $post->isbn = $isbn;
        $post->review_star = $request->review_star;
        $post->review_text = $request->review_text;
        $post->save();

        return redirect('/review/' . $isbn);
     }

}
