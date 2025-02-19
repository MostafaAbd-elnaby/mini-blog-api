<?php
namespace App\Traits;

use App\Models\Comment;
use App\Models\Post;

trait UserRelations
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
