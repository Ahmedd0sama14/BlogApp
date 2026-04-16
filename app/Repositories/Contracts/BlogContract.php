<?php
namespace App\Repositories\Contracts;
use App\Repositories\Contracts\BaseContract;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogContract extends BaseContract
{
    public function search(Request $request);
    public function userBlogs() :  LengthAwarePaginator;
    public function getAllCategories();
   



}
