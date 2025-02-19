<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private readonly CommentService $commentService)
    {}

    public function index($id)
    {
        return response()->json(['data' => $this->commentService->index($id)], 200);
    }

    public function store(CommentRequest $request, $id)
    {
        $this->commentService->store($request->validated(), $id);
        return response()->json(['message' => 'Comment created successfully'], 201);
    }
}
