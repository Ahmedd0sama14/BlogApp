<?php
namespace App\Repositories\Contracts;
use App\Repositories\Contracts\BaseContract;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogContract extends BaseContract
{
    public function search(array $request): LengthAwarePaginator;
    public function userBlogs() :  LengthAwarePaginator;
    public function getAllCategories();
    public function getAdminBlogs(string $type): LengthAwarePaginator;




}
