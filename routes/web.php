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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', [HomeController::class,'index'])->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

route::get('/home',[AdminController::class,'index'])->middleware(['auth','admin']);

route::get('/category_page',[AdminController::class,'category_page'])->middleware(['auth','admin']);

route::Post('/add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);

route::get('/cat_delete/{id}',[AdminController::class,'cat_delete'])->middleware(['auth','admin']);

route::get('/add_book',[AdminController::class,'add_book'])->middleware(['auth','admin']);

route::Post('/store_book',[AdminController::class,'store_book'])->middleware(['auth','admin']);

route::get('/show_book',[AdminController::class,'show_book'])->middleware(['auth','admin']);

Route::post('/book_delete/{id}', [AdminController::class, 'delete_book'])->middleware(['auth','admin']);

route::get('/edit_book/{id}',[AdminController::class,'edit_book'])->middleware(['auth','admin']);

route::Post('/update_book/{id}',[AdminController::class,'update_book'])->middleware(['auth','admin']);

route::get('/book_details/{id}',[HomeController::class,'book_details']);

Route::post('/borrow_book/{id}', [HomeController::class, 'borrow_book'])->name('borrow.book');

route::get('/borrow_request',[AdminController::class,'borrow_request'])->middleware(['auth','admin']);

Route::get('/book_history', [HomeController::class, 'book_history']);

route::get('/cancel_req/{id}',[HomeController::class,'cancel_req']);

Route::get('/explore', [HomeController::class,'explore']);

Route::get('/search', [HomeController::class,'search']);

Route::get('/cat_search/{id}', [HomeController::class,'cat_search']);

Route::get('/approve_book/{id}', [AdminController::class,'approve_book']);

Route::get('/return_book/{id}', [AdminController::class,'return_book']);

Route::get('/reject_book/{id}', [AdminController::class,'reject_book']);



Route::get('/user_list', [AdminController::class, 'userList'])->name('user.list');


