<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display the specified resource.
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        return $this->userService->findByID($id)->toJson();
    }
}
