<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class ModelService
{
    public function __construct(protected Model $model) {}

    public function find(int|string $id): ?Model
    {
        return $this->model->newQuery()->find($id);
    }

    public function findOrFail(int|string $id): Model
    {
        return $this->model->newQuery()->findOrFail($id);
    }

    public function findMany(array $ids): Collection
    {
        return $this->model->newQuery()->findMany($ids);
    }
}
