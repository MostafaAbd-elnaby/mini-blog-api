<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private readonly CommentService $commentService)
    {}

    public function index($postId)
    {
        return response()->json(['data' => $this->commentService->index($postId)], 200);
    }

    public function store(CommentRequest $request, $postId)
    {
        $this->commentService->store($request->validated(), $postId);
        return response()->json(['message' => 'Comment created successfully'], 201);
    }
}
