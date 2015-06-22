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
        $number_of_posts = Post::count();
        $comments = factory('App\Comment')->times($number_of_posts)->create();
        foreach ($comments as $comment) {
            if (rand(0, 1) == 0) {
                $post = Post::orderByRaw('RAND()')->first();
                $post->comments()->save($comment);
            } else {
                $parent = Comment::orderByRaw('RAND()')->first();
                $parent->comments()->save($comment);
            }
        }
    }
}
