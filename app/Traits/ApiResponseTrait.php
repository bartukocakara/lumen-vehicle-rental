<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

trait ApiResponseTrait
{
    /**
     * @param int $statusCode
     * @param null $data
     * @return Response
     */

    public function okResponse($data = null): Response
    {
        $code = Response::HTTP_OK;

        $responseData = [
            'status_code' => $code,
            'warning_list' =>  [],
            'info_list' => [],
            'error_list' => [],
            'message' => Response::$statusTexts[$code],
            'data' => $data
        ];
        $uuid = Uuid::uuid6();
        $responseData['uuid'] = $uuid->toString();

        //Log::error($data);
        return response($responseData, $code);
    }

    public function createdResponse($data = null): Response
    {
        $code = Response::HTTP_CREATED;
        $responseData = [
            'status_code' => $code,
            'warning_list' =>  [],
            'info_list' => [],
            'error_list' => [],
            'message' => Response::$statusTexts[$code]
        ];

        if ($data != null) {
            if (!is_array($data) || is_string($data)) {
                $data = json_encode($data);
                $responseData['data'] = json_decode($data);
            }
        }

        //Log::error($data);
        return response($responseData, $code);
    }

    public function respondWithGuestToken($token)
    {
        $code = Response::HTTP_CREATED;

        $responseData = [
            'status_code' => $code,
            'message' => Response::$statusTexts[$code],
            'data' => $token,
            'expires_in' => auth()->factory()->getTTL() * 360
        ];

        Log::error($token);
        return response($responseData, $code);
    }

    public function noContentResponse(): Response
    {
        return response(Response::HTTP_NO_CONTENT);
    }

    public function badRequestResponse($data = null): Response
    {
        $code = Response::HTTP_BAD_REQUEST;
        $responseData = [
            'status_code' => $code,
            'warning_list' =>  [],
            'info_list' => [],
            'error_list' => [],
            'message' => Response::$statusTexts[$code],
            'data' => $data
        ];

        Log::error($data);
        return response($responseData, $code);
    }

    public function respondWithToken($token)
    {
        $code = Response::HTTP_OK;

        $date = Carbon::now()->addDays(30);
        $date->toISO8601String();
        $date = $date->tz('Europe/Istanbul')->toDateTimeString();

        $responseData = [
            'status_code' => $code,
            'message' => Response::$statusTexts[$code],
            'data' => $token,
            'expires_in' => $date
        ];

        Log::error($token);
        return response($responseData, $code);
    }

    public function respondWithTokenCreateUser($token)
   {
       $code = Response::HTTP_CREATED;

       $date = Carbon::now()->addDays(30)->toDateTimeString();

       $responseData = [
           'status_code' => $code,
           'message' => Response::$statusTexts[$code],
           'data' => $token,
           'expires_in' => $date
       ];

       Log::error($token);
       return response($responseData, $code);
   }

    public function noDataResponse($data = null): Response
    {
        $code = 404;
        $responseData = [
            'status_code' => $code,
            'warning_list' =>  [],
            'info_list' => [],
            'error_list' => [],
            'message' => Response::$statusTexts[$code],
            'data' => $data
        ];

        //Log::error($data);
        return response($responseData, $code);
    }

    public function internalServerErrorResponse($data = null)
    {
        $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        $responseData = [
            'status_code' => $code,
            'message' => Response::$statusTexts[$code],
            'data' => $data
        ];

        Log::error($data);
        return response($responseData, $code);
    }

    public function permissionFailedResponse($data = null)
    {
        $code = Response::HTTP_FORBIDDEN;
        $responseData = [
            'status_code' => $code,
            'message' => Response::$statusTexts[$code],
            'data' => null
        ];

        Log::error($data);
        return response($responseData, $code);
    }

    public function unauthorizedResponse($data = null)
    {
        $code = Response::HTTP_UNAUTHORIZED;
        $responseData = [
            'status_code' => $code,
            'message' => Response::$statusTexts[$code],
            'data' => $data
        ];

        Log::error($data);
        return response($responseData, $code);
    }

    public function validationFailResponse($data = null)
    {
        $code = Response::HTTP_FORBIDDEN;

        $responseData = [
            'status_code' => $code,
            'warning_list' =>  [],
            'info_list' => [],
            'error_list' => [],
            'message' => Response::$statusTexts[$code],
            'data' => $data
        ];
        Log::error($data);
        return response($responseData, $code);
    }

    public function redirectResponse($data = null): Response
    {
        $code = 301;
        $responseData = [
            'status_code' => $code,
            'warning_list' =>  [],
            'info_list' => [],
            'error_list' => [],
            'message' => Response::$statusTexts[$code],
            'data' => $data
        ];

        Log::error($data);
        return response($responseData, $code);
    }
}
