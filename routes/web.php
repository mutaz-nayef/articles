<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'App\Http\Controllers\PagesController@home');
// Route::get('/', function (App\Models\Example $example) {
// //    return view('welcome');

// //    $example = resolve(App\Models\Example::class);
//    ddd($example);
// });


Route::get('/about', function () {
   $articles = App\Models\Article::take(3)->latest()->get(); // order by created_at desc
   return view('about',[
       'articles'=> $articles
   ]);
});
Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');
Route::get('/articles', 'App\Http\Controllers\ArticleController@index')->name('articles.index');
Route::post('/articles', 'App\Http\Controllers\ArticleController@store');
Route::get('/articles/create', 'App\Http\Controllers\ArticleController@create');
Route::get('/articles/{article}', 'App\Http\Controllers\ArticleController@show')->name('articles.show'); /*
  this name if you change the name of articles or directory to make it easy to deal and more dynamic  */
Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticleController@edit');
Route::put('/articles{article}','App\Http\Controllers\ArticleController@update');
