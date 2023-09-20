<?php

namespace App\Services\User;

use App\Models\User;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends ServiceApi implements UserService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    protected $title = "User";
    protected $create_message = "successfully created";
    protected $update_message = "successfully updated";
    protected $delete_message = "successfully deleted";

    public function __construct(UserRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * find by id service implement
     * @param string $id
     * @return ?User
     */
    public function findByID(string $id): UserService
    {
        try {
            $result = $this->mainRepository->findByID($id);
            dd($result);

            return $this->setStatus(true)->setResult($result);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }

    /**
     * find by email service implement
     * @param string $email
     * @return ?User
     */
    public function findByEmail(string $email): UserService
    {
        try {
            $result = $this->mainRepository->findByEmail($email);
            return $this->setStatus(true)
                ->setCode(200)
                ->setMessage("Success")
                ->setResult($result);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }
}
