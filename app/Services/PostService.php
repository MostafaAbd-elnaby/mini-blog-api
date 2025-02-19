<?php
namespace App\Services;

use App\Models\Post;

class PostService
{
    public function store(array $data)
    {
        $data['user_id'] = auth()->user()->id;
        Post::create($data);
    }

    public function update(Post $post, array $data)
    {
        $post->update($data);
    }

    public function delete(Post $post)
    {
        $post->delete();
    }

    public function index()
    {
        return Post::paginate(10);
    }

    public function show(Post $post)
    {
        return $post;
    }
}
