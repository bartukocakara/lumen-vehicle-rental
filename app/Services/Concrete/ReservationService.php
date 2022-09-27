<?php

namespace App\Services\Concrete;

use App\Repositories\Abstracts\IReservationRepository;
use App\Repositories\Abstracts\IVehicleRepository;
use App\Services\Abstracts\IReservationService;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;

class ReservationService implements IReservationService
{
    use ApiResponseTrait;

    /**
     * @var IReservationRepository
     */
    private IReservationRepository $repository;

    /**
     * PlayerService constructor.
     * @param IReservationRepository $ReservationRepository
     */
    public function __construct(IReservationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list($request)
    {
        return $this->repository->list($request);
    }

    public function create($request)
    {
        $data = $request->only('vehicle_id', 'user_id', 'from_date', 'to_date', 'note',
                               'from_location_longitude',
                               'from_location_latitude', 'to_location_longitude', 'to_location_latitude');
        $validator = Validator::make($data, [
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'user_id' => 'required|integer|exists:users,id',
            'from_date' => 'required|date|after:today',
            'to_date' => 'required|date|after:today',
            'from_location_longitude' => 'required|numeric|min:-90|max:90',
            'from_location_latitude' => 'required|numeric|min:-90|max:90',
            'to_location_longitude' => 'required|numeric|min:-90|max:90',
            'to_location_latitude' => 'required|numeric|min:-90|max:90',
        ]);
        if ($validator->fails()) {
            return $this->validationFailResponse($validator->messages());
        }

        return $this->repository->create($request);
    }

    public function show($reservationId)
    {
        return $this->repository->show($reservationId);
    }

    public function update($reservationId, $request)
    {
        $data = $request->only('vehicle_id', 'user_id', 'from_date', 'to_date', 'note',
                               'from_location_longitude',
                               'from_location_latitude', 'to_location_longitude', 'to_location_latitude');
        $data['reservation_id'] = intval($reservationId);
        $validator = Validator::make($data, [
            'reservation_id' => 'required|integer|exists:reservations,id',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'user_id' => 'required|integer|exists:users,id',
            'from_date' => 'required|date|after:today',
            'to_date' => 'required|date|after:today',
            'from_location_longitude' => 'required|numeric|min:-90|max:90',
            'from_location_latitude' => 'required|numeric|min:-90|max:90',
            'to_location_longitude' => 'required|numeric|min:-90|max:90',
            'to_location_latitude' => 'required|numeric|min:-90|max:90',
        ]);
        if ($validator->fails()) {
            return $this->validationFailResponse($validator->messages());
        }

        return $this->repository->update($reservationId, $request);
    }

    public function delete($reservationId)
    {
        return $this->repository->delete($reservationId);
    }
}
