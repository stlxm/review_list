<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function BookOrderByISBN()
    {
        // ISBNの早い順に本データを取得
        $books = Book::getAllBooksOrderedByISBN();

        // ビューにデータを渡す
        return view('toppage', compact('books'));
    }
}
