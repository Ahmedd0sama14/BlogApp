<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\Contracts\CategoryContract;


class CategoryController extends Controller
{
    public function __construct(protected CategoryContract $categoryRepository) {}

    public function index()
    {
        $categories = $this->categoryRepository->pagination($this->categoryRepository->query()->withCount('blogs')->latest(), 5);
        return view('admin.categories.category', compact('categories'));
    }
    public function show(Category $category)
    {
        $category = $this->categoryRepository->findWith($category->id, [], ['blogs']);
        $blogsCount = $category->blogs_count;
        $blogs = $this->categoryRepository->pagination($category->blogs()->latest(), 5);
        return view('admin.categories.blogs', compact('blogs', 'blogsCount', 'category'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $this->categoryRepository->create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }
    public function edit(Category $category)
    {
        $category = $this->categoryRepository->findWith($category->id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        $this->categoryRepository->update($category, $data);
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category )
    {
        $this->categoryRepository->delete($category);
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
