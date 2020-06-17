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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/articles/',function(){
//     return 'Article List';
// });

// Route::get('/articles/details',function(){
//     return "Article Details";
// }) -> name ('articles.details');

// Route::get('/articles/more',function(){
//     return redirect() -> route ('articles.details');
// });

Route::get('/','ArticleController@index');

Route::get('/articles','ArticleController@index');

Route::get('/articles/details/{id}','ArticleController@details');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles/add','ArticleController@add');

Route::post('articles/add','ArticleController@create');

Route::get('articles/delete/{id}','ArticleController@delete');

Route::post('/comments/add', 'CommetentController@create');
Route::get('/comments/delete/{id}', 'CommetentController@delete');
