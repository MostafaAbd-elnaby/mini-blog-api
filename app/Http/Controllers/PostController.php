<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    public function __construct(private readonly PostService $postService)
    {
    }

    public function index()
    {
        return response()->json(['data' => $this->postService->index()], 200);
    }

    public function store(PostRequest $request)
    {
        $this->postService->store($request->validated());
        return response()->json(['message' => 'Post created successfully'], 201);
    }

    public function show($id)
    {
        return $this->postService->show($id);
    }
}
