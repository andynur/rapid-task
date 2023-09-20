<?php

namespace App\Repositories\Task;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;

interface TaskRepository extends Repository
{

    /**
     * get all data
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * find data by id
     * @param string $id
     * @return ?Task
     */
    public function findByID(string $id): ?Task;

    /**
     * add new data
     * @return Task
     */
    public function insert(array $input): Task;

    /**
     * update data by id
     * @return Task
     */
    public function updateByID(array $input, string $id): Task;

    /**
     * delete data by id
     * @return bool
     */
    public function deleteByID(string $id): bool;
}
