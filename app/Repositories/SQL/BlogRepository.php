<?php

namespace App\Repositories\SQL;

use App\Models\Blog;
use App\Models\Category;
use App\Repositories\Contracts\BlogContract;
use App\Repositories\SQL\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogRepository extends BaseRepository implements BlogContract

{
    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }
    public function getAllCategories()
    {
        return Category::all();
    }
    public function search(Request $request)
    {
        $query = $request->input('search');
        $categoryId = $request->input('category_id');
        $blogs = $this->model->query();
        if ($categoryId) {
            $blogs->where('category_id', $categoryId);
        }

        if ($query) {

            $blogs->where(function ($q) use ($query) {

                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
            });
        }
        return $blogs->latest()->paginate(10)->withQueryString();
    }
    public function userBlogs(): LengthAwarePaginator
    {
        $userBlogs = $this->model->where('user_id', auth()->id())->paginate(3);
        return $userBlogs;
    }
}
