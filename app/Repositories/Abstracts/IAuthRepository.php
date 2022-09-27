<?php

namespace App\Repositories\Abstracts;

interface IAuthRepository extends IRepository
{
    public function register($request);

    public function registerConfirm($request);

    public function login($request);

    public function refreshToken();

    public function logout();
}
