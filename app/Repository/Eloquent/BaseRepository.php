<?php

namespace App\Repository\Eloquent;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model[]|Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @return Model
     */
    public function findOrFail(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $column
     * @return mixed
     */
    public function firstOrFail($column)
    {
        return $this->model->where('email',$column)->firstOrFail();
    }

    /**
     * @param int $modelId
     * @param array $attributes
     * @return bool
     */
    public function update(int $modelId, array $attributes): bool
    {
        $model = $this->findOrFail($modelId);

        return $model->update($attributes);

    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->model->query();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteById(int $id): bool
    {
        return $model = $this->model->findOrFail($id)->delete();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function firstOrCreate(array $attributes)
    {
        return $this->model->firstOrCreate($attributes);
    }

    /**
     * @param array $attributes1
     * @param array $attributes2
     * @return mixed
     */
    public function createOrUpdate(array $attributes1, array $attributes2)
    {
        return $this->model->updateOrCreate($attributes1, $attributes2);
    }

    /**
     * @param $column
     * @param string $operator
     * @param $value
     * @return mixed
     */
    public function whereGet($column, $operator, $value)
    {
        return $this->model->where($column,$operator,$value)->get();
    }

    /**
     * @param $column
     * @param string $operator
     * @param $value
     * @return mixed
     */
    public function whereFirst($column, $operator, $value)
    {
        return $this->model->where($column,$operator,$value)->first();
    }
}
