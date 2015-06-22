<?php

namespace App;

use Auth;

class Post extends BaseModel
{
    
    protected $fillable = ['title', 'content', 'score', 'user_id', 'subreddit_id'];

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'subreddit_id' => 'required|integer|exists:subreddits,id',
    ];

    public function subreddit()
    {
        return $this->belongsTo('App\Subreddit');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
