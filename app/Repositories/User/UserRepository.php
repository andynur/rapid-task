<?php

namespace App\Repositories\User;

use App\Models\User;
use LaravelEasyRepository\Repository;

interface UserRepository extends Repository
{
    /**
     * find data by id
     * @param string $id
     * @return ?User
     */
    public function findByID(string $id): ?User;

    /**
     * find data by email
     * @param string $email
     * @return ?User
     */
    public function findByEmail(string $email): ?User;
}
