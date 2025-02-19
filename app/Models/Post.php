<?php

namespace App\Models;

use App\Traits\PostRelations;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use PostRelations;

    public $fillable = [
        'user_id',
        'title',
        'description'
    ];
}
