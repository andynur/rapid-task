<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\Task\TaskService;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    protected $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->taskService->getAll()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();
        return $this->taskService->insert($validated)->toJson();
    }

    /**
     * Display the specified resource.
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        return $this->taskService->findByID($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id)
    {
        $validated = $request->validated();
        return $this->taskService->updateByID($validated, $id)->toJson();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->taskService->deleteByID($id)->toJson();
    }
}
