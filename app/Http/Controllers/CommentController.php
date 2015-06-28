<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Factories\CrudRepositoryFactory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Input;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->commentRepo = CrudRepositoryFactory::make('Comment');
        $this->postRepo = CrudRepositoryFactory::make('Post');
    }

    public function newCommentOnPost($id)
    {
        Input::merge(['user_id' => Auth::id()]);
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
