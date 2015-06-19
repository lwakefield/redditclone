<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{
	protected $fillable = ['content', 'score', 'user_id'];
	protected $with = ['comments'];
    protected $rules = [
        'content' => 'required',
        'score' => 'required|integer',
        'user_id' => 'required|integer|exists:users,id',
    ];

    public function commentable(){
    	return $this->morphTo();
    }

	public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
       
}
