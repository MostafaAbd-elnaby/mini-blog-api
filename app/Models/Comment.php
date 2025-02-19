<?php

namespace App\Models;

use App\Traits\CommentRelations;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use CommentRelations;

    public $fillable = [
        'user_id',
        'post_id',
        'comment',
    ];
}
