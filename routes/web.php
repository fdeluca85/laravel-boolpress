<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('front');
// });

Auth::routes();

Route::prefix("admin")->namespace("Admin")->middleware("auth")->group(function () {
    Route::resource("posts", "PostController");
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("categories", "CategoryController");
    Route::patch("comments/{comment}", "CommentController@update")->name("comments.update");
    Route::delete("comments/{comment}", "CommentController@destroy")->name("comments.destroy");
});

Route::get("{any?}", function () {
    return view("front");
})->where("any", ".*");
