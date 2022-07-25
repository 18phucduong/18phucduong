<?php
namespace App\Service;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
        
abstract class BaseModelService
{
    public function create(Model $model, array $adminData): Model
    {
        return $model->create($adminData);
    }

    public function update(Model $model, array $adminData): bool
    {
        return $model->update($adminData);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    public function findByField(Model $model, string $field, $value, string $operation = "="): Collection
    {
        return $model->where($field, $operation, $value)->get();
    }

    public function findFirstByField(Model $model, string $field, $value, string $operation  = "=")
    {
        return $model->where($field, $operation, $value)->first();
    }

    public function findById(Model $model, int $value)
    {
        return $model->where("id", $value)->first();
    }
}