<?php

namespace App\Http\Controllers;

use App\Subreddit;
use App\Post;

class SubredditController extends CrudController
{
    protected $class_name = 'App\Subreddit';

    public function create() {
        return view('subreddit.create');
    }

    public function newSubreddit(){
        $sub = $this->store();
        return redirect('/r/'.$sub->id);
    }

    public function show($id) {
    	$sub = Subreddit::find($id);
		$posts = $sub->posts()->paginate();
		$posts_with_rank =  array_combine(
			range($posts->firstitem(), $posts->lastitem()),
			$posts->items());
		$pagination_render = $posts->render();
    	return view('subreddit.show')->with(
    		['sub' => $sub,
    		'posts' => $posts_with_rank,
    		'pagination_render' => $pagination_render
    		]);
    }
}
