<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::WithCount('comments', 'likes');
        if (request('type')==='trending')
        {
            $blogs = $blogs->orderByDesc('comments_count');
        } else
        {
            $blogs = $blogs->latest();
        }
        $blogs = $blogs->paginate(5);
        return view('admin.blogs.index', compact('blogs'));
    }


    /**
     * Display the specified resource.
     */
   public function show(Blog $blog)
{
    $blog->loadCount('comments', 'likes');

    $comments = $blog->comments()
        ->with('user')
        ->latest()
        ->paginate(3);

    return view('admin.blogs.showone', compact('blog', 'comments'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        if($blog->image){
            Storage::disk('public')->delete($blog->image);
        }
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
