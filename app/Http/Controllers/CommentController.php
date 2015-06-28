<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->commentRepo = CrudRepositoryFactory::make('Comment');
        $this->postRepo = CrudRepositoryFactory::make('Post');
    }

    public function newCommentOnPost($id)
    {
        $child = $this->commentRepo->create();
        $parent = $this->commentRepo->retrieve($id);
        $parent->comments()->save($child);
        return redirect()->back();
    }

    public function newCommentOnComment($id)
    {
        $child = $this->commentRepo->create();
        $parent = $this->commentRepo->retrieve($id);
        $parent->comments()->save($child);
        return redirect()->back();
    }
}
