<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        $comment = factory('App\Comment')->create();
        $post = Post::orderByRaw('RAND()')->first();
        $post->comments()->save($comment);
        foreach(range(1,1000) as $i)
        {
            $comment = factory('App\Comment')->create();
            if(rand(0,1) == 0) {
                $post = Post::orderByRaw('RAND()')->first();
                $post->comments()->save($comment);
            } else {
                $parent = Comment::orderByRaw('RAND()')->first();
                $parent->comments()->save($comment);
            }
        }
    }
}
