<?php

namespace App\Repositories\SQL;

use App\Repositories\Contracts\BaseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
abstract class BaseRepository implements BaseContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }
    public function update(array $data, int $id): bool
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return true;
    }
    public function find(Model $model): Model
    {
        return $this->model->findOrFail($model->id);
    }



    public function getall(): Collection
    {
        return $this->model->all();
    }
    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}
