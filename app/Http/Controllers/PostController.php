<?php

namespace App\Http\Controllers;

use App\Post;

use Auth;
use Input;
use App\Factories\CrudRepositoryFactory;

class PostController extends Controller
{
    public function __construct()
    {
        $this->repo = CrudRepositoryFactory::make('Post');
    }

    public function create($subreddit_id)
    {
        return view('post.create')->with('subreddit_id', $subreddit_id);
    }

    public function newPost($subreddit_id)
    {
        Input::merge(['user_id' => Auth::id()]);
        $post = $this->repo->create();
        return redirect('/p/'.$post->id);
    }

    public function show($id)
    {
        $post = $this->repo->retrieve($id);
        $post->comments;
        return view('post.show')->with('post', $post);
    }
}
