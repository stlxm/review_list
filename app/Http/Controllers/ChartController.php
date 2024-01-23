<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;

class ChartController extends Controller
{
    public function chart($isbn=null)
    {
        // ISBNに対応する本の情報を取得
        $book = Book::where('isbn', $isbn)->first();

        $reviewsCount = Review::where('isbn', $isbn)
            ->select('review_star', \DB::raw('count(*) as count'))
            ->groupBy('review_star')
            ->get();

        return view('chart', compact('book', 'reviewsCount', 'isbn'));
    }
}
