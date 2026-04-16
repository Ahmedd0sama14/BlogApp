<?php
namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
interface BaseContract
{
    public function create(array $data): Model;
    public function update(array $data,int $id):bool;
    public function find(Model $model): Model;
    public function getall():Collection;
    public function delete(Model $model): bool;
}
