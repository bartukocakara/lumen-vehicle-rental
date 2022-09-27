<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Abstracts\IReservationService;
use App\Traits\ApiResponseTrait;

class ReservationController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var IReservationService
     */
    private IReservationService $reservationService;

    public function __construct(IReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /**
     * @OA\GET(
     *     path="/reservations",
     *     summary="Get Reservation List",
     *     description="Get reservation List",
     *     security={{"bearerAuth":{}}},
     *     tags={"Reservations"},
     *     @OA\Parameter(
     *          name="search",
     *          description="Search",
     *          required=false,
     *          example="2",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="sort_field",
     *          description="Sort by field",
     *          required=false,
     *          example="id",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="sort_order",
     *          description="Sort Order",
     *          required=false,
     *          example="asc",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="per_page",
     *          description="Per Page",
     *          required=false,
     *          example="10",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="page",
     *          description="Query string parameter",
     *          required=false,
     *          example="1",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function list(Request $request)
    {
        try {
            return $this->reservationService->list($request);
        }
        catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\GET(
     *     path="/reservations/{reservationId}",
     *     summary="Get Reservation Data",
     *     description="Get reservation Data",
     *     security={{"bearerAuth":{}}},
     *     tags={"Reservations"},
     *     @OA\Parameter(
     *          name="reservationId",
     *          description="reservation Id",
     *          required=true,
     *          example=1,
     *          in="path"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function show($reservationId)
    {
        try {
            return $this->reservationService->show($reservationId);
        }
        catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\POST(
     *     path="/reservations",
     *     summary="Create reservation Data",
     *     description="Create reservation Data",
     *     security={{"bearerAuth":{}}},
     *     tags={"Reservations"},
     *     @OA\Parameter(
     *          name="vehicle_id",
     *          description="Vehicle Id",
     *          required=true,
     *          example=2,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="user_id",
     *          description="User ID",
     *          required=true,
     *          example=1,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="from_date",
     *          description="From Date",
     *          required=true,
     *          example="2022-12-24 04:59:32",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="to_date",
     *          description="From Date",
     *          required=true,
     *          example="2023-01-24 04:59:32",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="from_location_latitude",
     *          description="From Date",
     *          required=true,
     *          example="80.232",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="from_location_longitude",
     *          description="From Date",
     *          required=true,
     *          example="30.232",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="to_location_latitude",
     *          description="From Date",
     *          required=true,
     *          example=1,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="to_location_longitude",
     *          description="From Date",
     *          required=true,
     *          example="-30.323",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="to_location_longitude",
     *          description="From Date",
     *          required=true,
     *          example="30.322",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="note",
     *          description="Notes",
     *          required=true,
     *          example="Test Note",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function create( Request $request)
    {
        try {
            return $this->reservationService->create( $request);
        }
        catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\PUT(
     *     path="/reservations/{reservationId}",
     *     summary="Update reservation Data",
     *     description="Update reservation Data",
     *     security={{"bearerAuth":{}}},
     *     tags={"Reservations"},
     *     @OA\Parameter(
     *          name="reservationId",
     *          description="reservation Id",
     *          required=true,
     *          example=1,
     *          in="path"
     *     ),
     *     @OA\Parameter(
     *          name="vehicle_id",
     *          description="Vehicle Id",
     *          required=true,
     *          example=2,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="user_id",
     *          description="User ID",
     *          required=true,
     *          example=1,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="from_date",
     *          description="From Date",
     *          required=true,
     *          example="2022-12-24 04:59:32",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="to_date",
     *          description="From Date",
     *          required=true,
     *          example="2023-01-24 04:59:32",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="from_location_latitude",
     *          description="From Date",
     *          required=true,
     *          example="80.232",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="from_location_longitude",
     *          description="From Date",
     *          required=true,
     *          example="30.232",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="to_location_latitude",
     *          description="From Date",
     *          required=true,
     *          example=1,
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="to_location_longitude",
     *          description="From Date",
     *          required=true,
     *          example="-30.323",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="to_location_longitude",
     *          description="From Date",
     *          required=true,
     *          example="30.322",
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="note",
     *          description="Notes",
     *          required=true,
     *          example="Test Note",
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function update($reservationId, Request $request)
    {
        try {
            return $this->reservationService->update($reservationId, $request);
        }
        catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }

    /**
     * @OA\DELETE(
     *     path="/reservations/{reservationId}",
     *     summary="Delete reservation Data",
     *     description="Delete reservation Data",
     *     security={{"bearerAuth":{}}},
     *     tags={"Reservations"},
     *     @OA\Parameter(
     *          name="reservationId",
     *          description="reservation Id",
     *          required=true,
     *          example=1,
     *          in="path"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="OK"),
     *     @OA\Response(
     *          response=400,
     *          description="Bad Request"),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized")
     * )
     */
    public function delete($reservationId )
    {
        try {
            return $this->reservationService->delete($reservationId);
        }
        catch (Exception $e) {
            return $this->badRequestResponse($e->getMessage());
        }
    }
}
