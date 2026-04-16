<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function index()
    {
        $count = Cache::remember('count', 400, function () {
            return [
                'blogs' => Blog::count(),
                'users' => User::where('type', 'user')->count(),
                'categories' => Category::count(),
                'comments' => Comment::count(),
            ];
        });
        $latestBlogs = Blog::latest()->take(5)->get();
        $latestComments = Comment::latest()->take(5)->get();
        return view('admin.index', compact('count', 'latestBlogs', 'latestComments'));
    }
    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }

}
