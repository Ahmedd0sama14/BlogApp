<?php

namespace App\Repositories\SQL;

use App\Models\Blog;
use App\Models\Category;
use App\Repositories\Contracts\BlogContract;
use App\Repositories\SQL\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

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
    public function search(array $request): LengthAwarePaginator
    {

        $query = trim($request['search'] ?? '');
        $blogs = $this->model->query();
        if ($query) {

            $blogs->where(function ($q) use ($query) {

                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
            });
        }
        return $this->pagination($blogs);
    }
    public function userBlogs(): LengthAwarePaginator
    {
        $userBlogs = $this->model->where('user_id', auth()->id());
        return $this->pagination($userBlogs);
    }
     public function getAdminBlogs(string $type): LengthAwarePaginator
     {
        $blogs = $this->model->withCount(['comments', 'likes']);
        if ($type==='trending')
            {
            $blogs = $blogs->orderByDesc('comments_count');
        } else  {
            $blogs = $blogs->latest();
        }
        $blogs = $this->pagination($blogs);
        return $blogs;

    }

}
