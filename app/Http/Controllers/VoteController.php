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
        $this->voteRepo = CrudRepositoryFactory::make('Vote');
    }

    public function newVoteOnPost($id)
    {
        $post = $this->postRepo->retrieve($id);
        return $this->newVoteOnModel($post);
    }

    public function newVoteOnComment($id)
    {
        $comment = $this->commentRepo->retrieve($id);
        return $this->newVoteOnModel($comment);
    }

    protected function newVoteOnModel($parent)
    {
        Input::merge(['user_id' => Auth::id()]);
        $vote = $this->voteRepo->create();
        $parent->votes()->save($vote);

        $up_votes = $parent->votes()->where('dir', '>', '0')->count();
        $down_votes = $parent->votes()->where('dir', '<', '0')->count();
        $parent->score = $up_votes + $down_votes;

        return redirect()->back();
    }
}
