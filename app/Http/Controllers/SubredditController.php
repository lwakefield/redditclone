<?php

namespace App\Http\Controllers;

use App\Subreddit;
use App\Post;

class SubredditController extends CrudController
{
    protected $class_name = 'App\Subreddit';

    public function create()
    {
        return view('subreddit.create');
    }

    public function newSubreddit()
    {
        $sub = $this->store();
        return redirect('/r/'.$sub->id);
    }

    public function show($id)
    {
        $sub = Subreddit::find($id);
        $posts = $this->getPostsFromSub($sub);
        $pagination_render = $this->getPaginationRenderFromSub($sub);
        return view('subreddit.show')->with([
            'sub' => $sub,
            'posts' => $posts,
            'pagination_render' => $pagination_render
        ]);
    }


    protected function getPostsFromSub($sub)
    {
        $posts = $sub->posts()->paginate();
        if ($posts->isEmpty()) {
            return [];
        }
        return array_combine(
            range($posts->firstitem(), $posts->lastitem()),
            $posts->items()
        );
    }

    protected function getPaginationRenderFromSub($sub)
    {
        return $sub->posts()->paginate()->render();
    }
}
