<?php

namespace App\Http\Controllers;

use App\Subreddit;
use App\Post;

class SubredditController extends CrudController
{
    protected $class_name = 'App\Subreddit';

    public function getSubreddit($id){
    	$sub = Subreddit::find($id);
		$posts = $sub->posts()->paginate();
		$posts_with_rank =  array_combine(
			range($posts->firstitem(), $posts->lastitem()),
			$posts->items());
		$pagination_render = $posts->render();
    	return view('subreddit')->with(
    		['sub' => $sub,
    		'posts' => $posts_with_rank,
    		'pagination_render' => $pagination_render
    		]);
    }

    public function getPost($id){
    	$post = Post::find($id);
    	$post->comments;
    	return view('post')->with('post', $post);
    }
}
