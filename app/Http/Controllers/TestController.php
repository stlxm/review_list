namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Review;

class TestController extends Controller
{
  public function index() {
	$review = new Review;
	$review_lists = $review->find(1);
    return view('index',compact('return_lists'));
}