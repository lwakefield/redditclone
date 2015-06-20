<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends CrudController
{
    protected $class_name = 'App\Post';

    public function show($id){
    	$post = Post::find($id);
    	$post->comments;
    	return view('post')->with('post', $post);
    }
}