<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;


class ThemController extends Controller
{
    public function index()
    {

        $blogs = Blog::orderBy('created_at', 'asc')->paginate(4);
        return view('Themes.index', compact('blogs'));
    }
    public function category($id)
    {

        $categoryBlogs = Blog::where('category_id', $id)->paginate(4);
        $CatogaryName= Category::find($id)->name;
        return view('Themes.category', compact('categoryBlogs', 'CatogaryName'));
    }

}
