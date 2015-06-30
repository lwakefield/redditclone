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

use App\Factories\CrudRepositoryFactory;

Route::get('/', function () {
    $subs = App\Subreddit::paginate(12);
    foreach ($subs as $sub) {
        $sub->load(['posts' => function ($query) {
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
Route::get('/r/{subreddit_id}/new-post', 'PostController@create');
Route::post('/r/{subreddit_id}/new-post', 'PostController@newPost');

Route::get('/r/{sub}', 'SubredditController@show');
Route::get('/new-subreddit', 'SubredditController@create');
Route::post('/new-subreddit', 'SubredditController@newSubreddit');

Route::get('/register', 'UserController@getRegister');
Route::post('/register', 'UserController@postRegister');

Route::post('/p/{post}/reply', 'CommentController@newCommentOnPost');
Route::post('/c/{comment}/reply', 'CommentController@newCommentOnComment');

Route::post('/p/{post}/vote', 'VoteController@voteOnPost');
Route::post('/c/{comment}/vote', 'VoteController@voteOnComment');
