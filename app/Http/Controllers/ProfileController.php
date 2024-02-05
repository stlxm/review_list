<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use App\Models\User;

class ProfileController extends Controller
{
    public function usertable($id = null,$user_id = null)
    {
        // 特定のISBNに関連する本のデータを取得
        $usertable = User::where('id', $id)->first();

        // 特定の ISBN のレビューのみを取得
        $reviews = Review::where('user_id', $user_id)->get();

        return view('review', compact('user_id', 'id', 'reviews'));
    }
}

?>