<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Blog;
use App\Services\StoreCommentService;

class CommentController extends Controller
{
    private StoreCommentService $commentService;
    public function __construct(StoreCommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    public function storeComment(StoreCommentRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['blog_id'] = $blog->id;
        $this->commentService->create($data);
        return redirect()->back()->with('success', 'Comment added successfully!');
    }
    
}
