<?php
namespace App\Services;

use App\Contracts\CommentServiceContract;
use App\Models\Comment;
use App\Services\ContentFilterService;

Class CommentService implements CommentServiceContract
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
    public function update(int $commentId,array $data)
    {
        $comment = Comment::findOrFail($commentId);
        $data['message'] = $this->contentFilter->filterContent($data['message']);   
        $comment->update($data);
        return $comment;
    }
    public function delete(int $commentId): bool
    {
        $comment = Comment::findOrFail($commentId);
        return $comment->delete();
    }

}
