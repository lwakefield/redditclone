<?php

namespace App;

class Post extends BaseModel
{

    protected $fillable = ['title', 'content', 'score', 'user_id', 'subreddit_id'];

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        // 'score' => 'required|integer',
        // 'user_id' => 'required|integer|exists:users,id',
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
