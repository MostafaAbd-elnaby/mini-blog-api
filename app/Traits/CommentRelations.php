<?php
namespace App\Traits;

use App\Models\Post;
use App\Models\User;

trait CommentRelations
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
