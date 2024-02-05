<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;

class ReviewController extends Controller
{
    public function index($isbn = null)
    {
        // 特定のISBNに関連する本のデータを取得
        $book = Book::where('isbn', $isbn)->first();

        // 特定の ISBN のレビューのみを取得
        $reviews = Review::where('isbn', $isbn)->get();

        return view('review', compact('book', 'isbn', 'reviews'));
    }

    public function column(Request $request, $isbn = null)
    {
        // 特定のISBNに関連する本のデータを取得
        $book = Book::where('isbn', $isbn)->first();

        // ソートのデフォルト設定
        $sortColumn = $request->input('sortColumn', 'created_at');
        $sortDirection = 'asc';

        // 特定の ISBN のレビューのみを取得
        $reviews = Review::where('isbn', $isbn)
            ->orderBy($sortColumn, $sortDirection)
            ->get();

        return view('review', compact('book', 'isbn', 'reviews', 'sortColumn'));
    }
}

?>