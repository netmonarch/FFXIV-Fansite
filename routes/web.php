<?php
use App\StatBlock;
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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('forum','ForumController');

	Route::post ('forum/{forum}/topic', 'TopicController@store');

	Route::get('/topic/{topic}', 'TopicController@show');

		Route::post('/topic/{topic}/comment', 'CommentController@store');
		Route::patch('/topic/{topic}/comment', 'CommentController@update');
		
	Route::patch('forum/{forum}/topic', 'TopicController@update');
	
	Route::delete('/topic/{topic}/destroy', 'TopicController@destroy');
	Route::delete('/comment/{comment}/destroy', 'CommentController@destroy');



Route::get('/gallery', 'GalleryController@index');
Route::post('/gallery/store', 'GalleryController@store');

Route::get('/account', 'HomeController@account');

Route::get('/about', 'HomeController@about');

Route::resource('/message', 'MessageController');
