<?php

namespace App\Services\Task;

use LaravelEasyRepository\BaseService;

interface TaskService extends BaseService
{
    /**
     * get all task service
     * @param string $id
     * @return Response
     */
    public function getAll(): TaskService;

    /**
     * find task by id service
     * @param string $id
     * @return Response
     */
    public function findByID(string $id): TaskService;

    /**
     * add new task service
     * @param array $input
     * @return Response
     */
    public function insert(array $input): TaskService;

    /**
     * update task service
     * @param array $input
     * @param string $id
     * @return Response
     */
    public function updateByID(array $input, string $id): TaskService;

    /**
     * delete task service
     * @param string $id
     * @return Response
     */
    public function deleteByID(string $id): TaskService;
}
