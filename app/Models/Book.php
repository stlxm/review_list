<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // テーブル名
    protected $table = 'books';

    // プライマリキーのカラム名
    protected $primaryKey = 'isbn';

    // タイムスタンプを使用しない
    public $timestamps = false;

    // 可変項目（Mass Assignment）の設定
    protected $fillable = ['isbn', 'title', 'writer'];

    public static function getAllBooksOrderedByISBN()
    {
        return self::orderBy('isbn')->get();
    }
}
