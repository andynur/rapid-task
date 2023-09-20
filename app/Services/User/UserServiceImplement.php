<?php

namespace App\Services\User;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Response;

class UserServiceImplement extends ServiceApi implements UserService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    /**
     * find by id service implement
     * @param string $id
     * @return UserService
     */
    public function findByID(string $id): UserService
    {
        try {
            $result = $this->mainRepository->findByID($id);
            if ($result == null) {
                return $this->setStatus(false)
                    ->setCode(Response::HTTP_NOT_FOUND)
                    ->setMessage('user is not exist');
            }

            return $this->setStatus(true)->setResult($result);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }

    /**
     * find by email service implement
     * @param string $email
     * @return UserService
     */
    public function findByEmail(string $email): UserService
    {
        try {
            $result = $this->mainRepository->findByEmail($email);
            if ($result == null) {
                return $this->setStatus(false)
                    ->setCode(Response::HTTP_NOT_FOUND)
                    ->setMessage('user is not exist');
            }

            return $this->setStatus(true)->setResult($result);
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }
}
