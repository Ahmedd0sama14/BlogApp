<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = Blog::count();
        $users = User::where('type', 'user')->count();
        $categories = Category::count();
        $comments = Comment::latest()->take(5)->get();
        return view('admin.index', compact('blogs', 'users', 'categories', 'comments'));
    }
}