<?php

namespace App\Services\Abstracts;

use Illuminate\Http\Request;

interface IAuthService
{
    public function register($request);

    public function registerConfirm($request);

    public function login($request);

    public function refreshToken();

    public function logout();

    public function updatePassword($request);

}
