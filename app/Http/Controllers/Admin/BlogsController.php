<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\Contracts\BlogContract;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    public function __construct(protected BlogContract $blogRepository,protected BlogService $blogService) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $blogs = $this->blogRepository->getAdminBlogs($request->type ?? 'latest');

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
        $this->blogService->deleteBlog($blog);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
