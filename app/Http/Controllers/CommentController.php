<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Blog;
use App\Models\Comment;

class CommentController extends Controller
{
    public function storeComment(StoreCommentRequest $request,Blog $blog)
    {
        $comment=Comment::create([
            ...$request->validated(),
            'user_id'=>auth()->id(),
            'blog_id'=>$blog->id,
            'email'=>auth()->user()->email,
            'name'=>auth()->user()->name
        ]);

        return redirect()->back()->with('success', 'Comment added successfully!');

    }
    public function deleteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}