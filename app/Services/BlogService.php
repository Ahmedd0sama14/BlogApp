<?php

namespace App\Services;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Repositories\Contracts\BlogContract;
use App\Services\ContentFilterService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogService
{

    public function __construct(
        protected BlogContract $blogRepository,
        protected ContentFilterService $contentFilter
    ) {}

    public function createBlog(StoreBlogRequest $request)
    {
        $validatedData = $this->filterContent($request->validated());
        $validatedData['user_id'] = auth()->id();
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->handleImage($request->category->id, $request->file('image'));
        }

        return $this->blogRepository->create($validatedData);
    }
    public function updateBlog(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $data = $this->filterContent($data);
        if ($request->hasFile('image')) {
            $data['image'] = $this->handleImage($blog->category, $request->file('image'), $blog->image);
        }

        return $this->blogRepository->update($data, $blog->id);
    }
    private function filterContent(array $data): array
    {
        $data['name'] = $this->contentFilter->filterContent($data['name']);
        $data['content'] = $this->contentFilter->filterContent($data['content']);
        return $data;
    }
    public function deleteBlog(Blog $blog)
    {
        if ($blog->image) {
            $this->deleteImage($blog->image);
        }
        return $this->blogRepository->delete($blog);
    }
    public function handleImage($category, $image, $oldImagePath = null)
    {
        if ($oldImagePath) {
            $this->deleteImage($oldImagePath);
        }
        $foldername = Str::slug($category->name);

        return $image->store("blog_images/{$foldername}", 'public');
    }
    public function deleteImage($imagePath): void
    {
        Storage::disk('public')->delete($imagePath);
    }
}