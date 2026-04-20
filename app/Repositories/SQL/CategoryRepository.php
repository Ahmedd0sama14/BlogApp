<?php

namespace App\Repositories\SQL;

use App\Models\Category;
use App\Repositories\Contracts\CategoryContract;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

}
