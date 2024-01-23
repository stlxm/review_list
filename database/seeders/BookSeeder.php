<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 既に存在するISBNのリストを取得
        $existingIsbns = Book::pluck('isbn')->toArray();

        // データを挿入
        $data = [
            ['isbn' => '1111', 'title' => 'コンクリート入門', 'writer' => '岩尾岩太'],
            ['isbn' => '2222', 'title' => 'キシリトール演習', 'writer' => '歯山歯流'],
            // 他のデータ...
        ];
            }
        }
