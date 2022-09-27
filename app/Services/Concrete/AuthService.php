<?php

namespace App\Services\Concrete;

use App\Repositories\Abstracts\IAuthRepository;
use App\Services\Abstracts\IAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;


class AuthService implements IAuthService
{
    use ApiResponseTrait;
    /**
     * @var IAuthRepository
     */
    private IAuthRepository $repository;

    /**
     * AuthService constructor.
     * @param IAuthRepository $authRepository
     */
    public function __construct(IAuthRepository $authRepository)
    {
        $this->repository = $authRepository;
    }

    /**
     * @return string
     */
    public function register($request)
    {
        $data = $request->only('email', 'password', 'first_name', 'last_name');
        $validator = Validator::make($data, [
                'first_name' => 'required|string|min:2|max:50',
                'last_name' => 'required|string|min:2|max:50',
                'email' => 'required|email:rfc,dns|unique:users',
                'password' => 'required|string|min:6|max:50',
            ]);
        if ($validator->fails()) {
                return $this->validationFailResponse($validator->messages());
        }

        return $this->repository->register($request);
    }

    public function registerConfirm($request)
    {
        return $this->repository->registerConfirm($request);
    }

    public function login($request)
    {
        return $this->repository->login($request);
    }

    public function me()
    {
        return $this->repository->me();
    }

    public function refreshToken()
    {
        return $this->repository->refreshToken();
    }

    public function logout()
    {
        return $this->repository->logout();
    }

    public function updatePassword($request)
    {
        return $this->repository->updatePassword($request);
    }
}
