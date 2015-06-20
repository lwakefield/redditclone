<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $subs = App\Subreddit::paginate(12);
    foreach ($subs as $sub) {
        $sub->load(['posts' => function($query) {
            $query->limit(5);
        }]);
    }
    return view('home')
        ->with(['subs' => $subs]);

});

Route::resource('/api/subreddit', 'SubredditController');
Route::resource('/api/users', 'UserController');

Route::any('/logout', 'AuthController@anyLogout');
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin');

Route::get('/p/{post}', 'PostController@show');

Route::get('/new-subreddit', 'SubredditController@create');
Route::get('/r/{sub}', 'SubredditController@show');

Route::get('/register', 'UserController@getRegister');
Route::post('/register', 'UserController@postRegister');