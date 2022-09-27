<?php

namespace App\Http\Controllers;

use App\Services\Abstracts\IAuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponseTrait;


class AuthController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var IAuthService
     */
    private IAuthService $service;

    /**
     * MobileInitController constructor.
     * @param IInitService $initService
     */
    public function __construct(IAuthService $authService)
    {
        $this->service = $authService;
    }

    /**
     * @OA\POST(
     *     path="/auth/login",
     *     summary="Login User",
     *     description="Login User",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *          name="email",
     *          description="User e-mail address",
     *          required=true,
     *          example="borholding@gmail.com",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          example="password",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="Login User"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */
    public function login(Request $request)
    {
        try {
            return $this->service->login($request);
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }


    /**
     * @OA\POST(
     *     path="/auth/register",
     *     summary="Register User",
     *     description="Register User",
     *     tags={"Auth"},
     *     @OA\Parameter(
     *          name="email",
     *          description="User e-mail address",
     *          required=true,
     *          example="borholdingg@gmail.com",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          example="passwordd",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="first_name",
     *          description="First name",
     *          required=true,
     *          example="borfirst",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="last_name",
     *          description="Last name",
     *          required=true,
     *          example="borlast",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response="201",
     *          description="Created"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */
    public function register(Request $request)
    {
        return $this->service->register($request);
    }

    /**
     * @OA\POST(
     *     path="/auth/logout",
     *     summary="Logout User",
     *     tags={"Auth"},
     *     description="Logout User",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *          response="200",
     *          description="Logout User"),
     *     @OA\Response(
     *          response=404,
     *          description="Wrong Request"
     *     )
     * )
     */

    public function logout() : object
    {
        try {
            return $this->okResponse($this->service->logout());
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\GET(
     *     path="/auth/refresh-token",
     *     summary="Refresh Token",
     *     security={{"bearerAuth":{}}},
     *     tags={"Auth"},
     *     description="Refresh Token",
     *     @OA\Response(
     *          response="200",
     *          description="Refresh Token"),
     *     @OA\Response(
     *          response=404,
     *          description="Wrong Request"
     *     ),
     * )
     */
    public function refreshToken()
    {
        try {
            return $this->service->refreshToken();
        } catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }
}
