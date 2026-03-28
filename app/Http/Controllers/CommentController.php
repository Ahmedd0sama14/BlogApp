<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(StoreCommentRequest $request, $blogId)
    {
        $validatedData = $request->validated();
        $validatedData['blog_id'] = $blogId;
        $validatedData['user_id'] = auth()->id();
        $validatedData['email'] = auth()->user()->email;
        $validatedData['name'] = auth()->user()->name;
        Comment::create($validatedData);
        return redirect()->back()->with('success', 'Comment added successfully!');

    }
    public function deleteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
