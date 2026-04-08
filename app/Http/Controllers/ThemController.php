<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;


class ThemController extends Controller
{
    public function index()
    {

        $blogs = Blog::orderBy('created_at', 'desc')->paginate(4);
        return view('Themes.index', compact('blogs'));
    }
    public function category($id)
    {
        $category= Category::findorFail($id);
        $categoryBlogs = $category->blogs()->latest()->paginate(4);
        return view('Themes.blogs.category', compact('categoryBlogs', 'category'));
    }

}
