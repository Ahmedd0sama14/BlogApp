<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Repositories\SQL\BlogRepository;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct( protected BlogRepository $blogRepository,protected BlogService $blogService)
    {
        $this->middleware('auth')->except(['show']);
    }


    public function userBlogs()
    {
        $userBlogs = $this->blogRepository->userBlogs();

        return view('Themes.blogs.userblogs', compact('userBlogs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catogories = $this->blogRepository->getallcategories();
        return view('Themes.blogs.addnewblog', compact('catogories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $this->blogService->createBlog($request);
        return redirect()->route('index')->with('success', 'Blog created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $this->blogRepository->find($blog);
        return view('Themes.blogs.blog-details', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = $this->blogRepository->getAllCategories();
        return view('Themes.blogs.editblog', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->blogService->update($request, $blog);
        return redirect()->route('index')->with('success', 'Blog updated successfully!');
    }
    public function search(Request $request)
    {
        $blogs = $this->blogRepository->search($request);

        return view('Themes.index', compact('blogs'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->blogRepository->deleteImage($blog->image);
        $this->blogRepository->delete($blog);
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
    public function like(Blog $blog)
    {

        $blog->likes()->toggle(auth()->id());
        return redirect()->back();
    }
}
