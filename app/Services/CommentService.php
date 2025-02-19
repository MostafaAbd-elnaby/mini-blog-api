<?php
namespace App\Services;

use App\Models\Comment;

class CommentService
{

    public function store(array $data, $postId)
    {
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $postId;
        Comment::create($data);
    }

    public function index($postId)
    {
        return Comment::where('post_id', $postId)->paginate(10);
    }
}
