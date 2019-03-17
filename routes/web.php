<?php
 use App\Post;
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

Route::get('/', function () {
    return view('welcome');

});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', 'PostsController@index')
    ->name('posts.index')
    ;
    Route::get('/posts/create', 'PostsController@create')
    ->name('posts.create')
    ;
    Route::post('/posts', 'PostsController@store')
    ->name('posts.store')
    ;
    Route::get('/posts/{post}/edit', 'PostsController@edit')
    ->name('posts.edit');
    Route::put('/posts/{post}/update','PostsController@update')
    ->name('posts.update');
    Route::get('/posts/{post}/show','PostsController@show')
    ->name('posts.show');
    Route::delete('/posts/{post}','PostsController@destroy')
    ->name('posts.destroy');

    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
/*Route::get('/posts', 'PostsController@index')
->name('posts.index')
->middleware('auth');
Route::get('/posts/create', 'PostsController@create')
->name('posts.create')
->middleware('auth');
Route::post('/posts','PostsController@store')
->name('posts.store')
->middleware('auth');
Route::get('/posts/{post}/edit','PostsController@edit')
->name('posts.edit')
->middleware('auth');
Route::put('/posts/{post}/update','PostsController@update')
->name('posts.update')
->middleware('auth');
Route::get('/posts/{post}/show','PostsController@show')
->name('posts.show')
->middleware('auth');
Route::delete('/posts/{post}','PostsController@destroy')
->name('posts.destroy')
->middleware('auth');*/


