<?php

namespace App\Services;

use App\Models\Comment;
use App\Services\ContentFilterService;

class StoreCommentService
{
    protected ContentFilterService $contentFilter;
    public function __construct(ContentFilterService $contentFilter)
    {
        $this->contentFilter = $contentFilter;
    }

    public function create(array $data)
    {
        $data['message'] = $this->contentFilter->filterContent($data['message']);
        return Comment::create($data);
    }
}