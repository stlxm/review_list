<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class IDController extends Controller
{
    public function id($user_id = null)
    {

        $reviews = Review::where('user_id', $user_id)->get();

        return view('user', compact('user_id', 'reviews'));
    }

    public function column(Request $request, $user_id = null)
    {
        // ソートのデフォルト設定
        $sortColumn = $request->input('sortColumn', 'created_at');
        $sortDirection = 'asc';

        // 特定の ISBN のレビューのみを取得
        $reviews = Review::where('user_id', $user_id)
            ->orderBy($sortColumn, $sortDirection)
            ->get();

        return view('user', compact('user_id', 'reviews', 'sortColumn'));
    }
}