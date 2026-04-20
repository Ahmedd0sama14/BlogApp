<?php

namespace App\Repositories\SQL;

use App\Repositories\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseContract
{

    public function __construct(protected Model $model) {}
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }
    public function update(Model $model, array $data): bool
    {
       return $model->update($data);

    }
    public function findWith(int $id,array $with=[],array $withCount=[]): Model
    {
        return $this->model->with($with)->withCount($withCount)->findOrFail($id);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
    public function getAll(): Collection
    {
        return $this->model->all();
    }
    public function pagination(Relation|Builder $query, int $perPage = 5): LengthAwarePaginator
    {
        return $query->paginate($perPage)->withQueryString();
    }
    public function query(): Builder
    {
        return $this->model->query();
    }
}
