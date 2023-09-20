<?php

namespace App\Repositories\Task;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepositoryImplement extends Eloquent implements TaskRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    /**
     * get all data
     * @param string $id
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->with('user')->orderBy('id', 'desc')->get();
    }

    /**
     * find data by id
     * @param string $id
     * @return ?Task
     */
    public function findByID(string $id): ?Task
    {
        return $this->model->with('user')->where('id', $id)->first();
    }

    /**
     * add new data
     * @return Task
     */
    public function insert(array $input): Task
    {
        return $this->model->create($input);
    }

    /**
     * update data by id
     * @return Task
     */
    public function updateByID(array $input, string $id): Task
    {
        $task = $this->findByID($id);
        $task->update($input);
        return $task;
    }

    /**
     * delete data by id
     * @return bool
     */
    public function deleteByID(string $id): bool
    {
        return $this->model->where('id', $id)->delete();
    }
}
