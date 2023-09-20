<?php

namespace App\Services\User;

use App\Models\User;
use LaravelEasyRepository\BaseService;

interface UserService extends BaseService
{
    /**
     * find by id service
     * @param string $id
     * @return Response
     */
    public function findByID(string $id): UserService;

    /**
     * find by email service
     * @param string $email
     * @return Response
     */
    public function findByEmail(string $email): UserService;
}
