<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends CrudController
{
    protected $class_name = 'App\Post';

    public function create($subreddit_id)
    {
        return view('post.create')->with('subreddit_id', $subreddit_id);
    }

    public function newPost($subreddit_id)
    {
        $post = $this->store();
        dd($post);
        return redirect('/p/'.$post->id);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $post->comments;
        return view('post.show')->with('post', $post);
    }
}
