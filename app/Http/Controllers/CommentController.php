<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Services\CommentService;

class CommentController extends Controller
{
    private CommentService $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService =$commentService;
    }
    public function storeComment(StoreCommentRequest $request,Blog $blog )
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['blog_id'] = $blog->id;
        $this->commentService->create($data);
        return redirect()->back()->with('success', 'Comment added successfully!');

    }
    public function updateComment(StoreCommentRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $this->commentService->update($comment->id, $data);
        return redirect()->back()->with('success', 'Comment updated successfully!');
    }
    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
