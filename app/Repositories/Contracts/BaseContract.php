<?php
namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseContract
{
    public function create(array $data): Model;
    public function update(Model $model,array $data):bool;
    public function findWith(int $id,array $with=[],array $withCount=[]): Model;
    public function getAll():Collection;
    public function pagination(Builder $query, int $perPage ): LengthAwarePaginator;
    public function query(): Builder;
    public function delete(Model $model): bool;
}
