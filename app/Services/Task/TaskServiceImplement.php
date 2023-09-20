<?php

namespace App\Services\Task;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Task\TaskRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Response;

class TaskServiceImplement extends ServiceApi implements TaskService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;
    protected $userRepository;

    public function __construct(TaskRepository $mainRepository, UserRepository $userRepository)
    {
        $this->mainRepository = $mainRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * get all task service implementation
     * @param string $id
     * @return TaskService
     */
    public function getAll(): TaskService
    {
        try {
            $result = $this->mainRepository->getAll();
            $transformer = TaskResource::collection($result);
            return $this->setStatus(true)->setResult($transformer);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }

    /**
     * find task by id service implementation
     * @param string $id
     * @return TaskService
     */
    public function findByID(string $id): TaskService
    {
        try {
            $result = $this->mainRepository->findByID($id);
            if ($result == null) {
                return $this->setStatus(false)
                    ->setCode(Response::HTTP_NOT_FOUND)
                    ->setMessage('task is not exist');
            }

            $transformer = new TaskResource($result);
            return $this->setStatus(true)->setResult($transformer);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }

    /**
     * add new task service implementation
     * @return TaskService
     */
    public function insert(array $input): TaskService
    {
        try {
            // check exist user id
            $user = $this->userRepository->findByID($input['user_id']);
            if ($user == null) {
                return $this->setStatus(false)
                    ->setCode(Response::HTTP_NOT_FOUND)
                    ->setMessage('user is not exist');
            }

            $result = $this->mainRepository->insert($input);
            $transformer = new TaskResource($result);

            return $this->setStatus(true)
                ->setMessage('success store task')
                ->setCode(Response::HTTP_CREATED)
                ->setResult($transformer);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }

    /**
     * update task service implementation
     * @return TaskService
     */
    public function updateByID(array $input, string $id): TaskService
    {
        try {
            // check exist user id
            $user = $this->userRepository->findByID($input['user_id']);
            if ($user == null) {
                return $this->setStatus(false)
                    ->setCode(Response::HTTP_NOT_FOUND)
                    ->setMessage('user is not exist');
            }

            $task = $this->mainRepository->findByID($id);
            if ($task == null) {
                return $this->setStatus(false)
                    ->setCode(Response::HTTP_NOT_FOUND)
                    ->setMessage('task is not exist');
            }

            $this->mainRepository->updateByID($input, $id);
            $transformer = new TaskResource($task);

            return $this->setStatus(true)
                ->setMessage('success update task')
                ->setResult($transformer);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }

    /**
     * delete task service implementation
     * @return TaskService
     */
    public function deleteByID(string $id): TaskService
    {
        try {
            $task = $this->mainRepository->findByID($id);
            if ($task == null) {
                return $this->setStatus(false)
                    ->setCode(Response::HTTP_NOT_FOUND)
                    ->setMessage('task is not exist');
            }

            $this->mainRepository->deleteByID($id);

            return $this->setStatus(true)
                ->setMessage('success delete task')
                ->setResult(null);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }
}
