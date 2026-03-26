<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    public function userBlogs()
    {
        $userBlogs = Blog::where('user_id', auth()->id())->get();
        return view('Themes.blogs.userblogs', compact('userBlogs'));

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catogories = Category::all();
        return view('Themes.blogs.addnewblog', compact('catogories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $category = Category::findOrFail($validatedData['category_id']);
            $foldername=Str::slug($category->name);
            $imagePath = $request->file('image')->store('blog_images/' . $foldername, 'public');
            $validatedData['image'] = $imagePath;
        }
        $validatedData['user_id'] = auth()->id();
        try {
            Blog::create($validatedData);
            return redirect()->back()->with('success', 'Blog created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the blog: ' );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('Themes.blog-details', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
