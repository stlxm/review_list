<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
   return view('welcome');
});

use App\Http\Controllers\BookController;

Route::get('/toppage', [BookController::class, 'BookOrderByISBN']);

use App\Http\Controllers\InputController;

Route::get('/input/{isbn?}', [InputController::class, 'input']);

Route::get('/add/{isbn?}', [InputController::class, 'add']);

Route::post('/add/{isbn?}', [InputController::class, 'add']);


use App\Http\Controllers\ReviewController;

Route::get('/review/{isbn?}', [ReviewController::class, 'index'])->name('review.index');
Route::get('/review/{isbn?}/sort', [ReviewController::class, 'column'])->name('review.sort');

use App\Http\Controllers\ChartController;
Route::get('/chart/{isbn?}', [ChartController::class, 'chart']);

use App\Http\Controllers\UserController;

Route::get('/register',[UserController::class,'showRegister']);
Route::post('/register',[UserController::class,'register']);
//ログインしていない状態でprofile行くとloginに行くようにする
Route::get('/login',[UserController::class,'showLogin'])->name('login');
Route::post('/login',[UserController::class,'login']);

Route::middleware('auth')->group(function (){
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    Route::post('/logout',[UserController::class,'logout'])->name('user.logout');
});