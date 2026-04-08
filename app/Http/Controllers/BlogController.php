<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    public function userBlogs()
    {
        $userBlogs = Blog::where('user_id', auth()->id())->paginate(2);
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
            $validatedData['image'] = $this->handelImage($validatedData['category_id'], $request->file('image'));
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
        return view('Themes.blogs.blog-details', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('Themes.blogs.editblog', compact('blog', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data =$request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = $this->handelImage($data['category_id'], $request->file('image'), $blog->image);
        }
        $blog->update($data);
        return redirect()->back()->with('success', 'Blog updated successfully!');

    }
  public function search(Request $request)
{
    $query = $request->input('search');
    $categoryId = $request->input('category_id');

    $blogs = Blog::query();
    if ($categoryId) {
        $blogs->where('category_id', $categoryId);
    }

    if ($query) {

        $blogs->where(function ($q) use ($query) {

            $q->where('name', 'like', "%{$query}%")
              ->orWhere('content', 'like', "%{$query}%");

        });
    }

    $blogs = $blogs->latest()->paginate(3)->withQueryString();

    return view('Themes.index', compact('blogs'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->deleteImage($blog->image);

        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
    public function like(Blog $blog)
    {

       $blog->likes()->toggle(auth()->id());
        return redirect()->back();
    }

    private function deleteImage($imagePath)
    {
        Storage::disk('public')->delete($imagePath);
    }


    private function handelImage($categoryId,$image,$oldImagePath = null)
    {
        if ($oldImagePath) {
             $this->deleteImage($image);
        }
        $category = Category::findOrFail($categoryId);
        $foldername=Str::slug($category->name);

        return $image->store("blog_images/{$foldername}", 'public');

    }

}
