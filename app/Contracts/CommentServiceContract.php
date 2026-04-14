<?php
namespace App\Contracts;
interface CommentServiceContract
{
    public function create(array $data);
    public function update(int $commentId,array $data);


}