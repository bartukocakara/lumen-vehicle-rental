<?php

namespace App\Repositories\Concrete;

use App\Repositories\Abstracts\IReservationRepository;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;
use App\Traits\LocationTrait;
use App\Traits\TaxCalculateTrait;
use App\Models\Reservation;
use App\Http\Resources\ReservationResource;

class ReservationRepository extends BaseRepository implements IReservationRepository
{
    use ApiResponseTrait, LocationTrait, TaxCalculateTrait;

    CONST TAX_RATE = 0.08;

    public function __construct(public Reservation $reservation)
    {
    }

    public function list($request)
    {
        $model = $this->handleTable($this->reservation, $request, 'vehicle_id');
        return ReservationResource::collection($model);
    }

    public function show($id)
    {
        $model = DB::table('reservations')
                    ->where('id', $id)
                    ->first(['id', 'vehicle_id', 'user_id', 'from_date',
                             'to_date', 'from_location', 'to_location',
                             'grand_total', 'sub_total'
                            ]);
        if ($model != null) {
            $model->from_location = json_decode($model->from_location, true);
            $model->to_location = json_decode($model->to_location, true);
        }
        return $this->okResponse($model);
    }

    public function create($request)
    {
        list($fromLocation, $toLocation) = $this->locationJsonEncoder($request);
        $subTotal = DB::table('vehicles')
                            ->where('id', $request->vehicle_id)
                            ->select('price')
                            ->first()->price;
        list($taxPrice, $grandTotal) = $this->taxCalculate($subTotal, self::TAX_RATE);
        $insert = DB::table('reservations')->insert([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => $request->user_id,
            'from_location' => $fromLocation,
            'to_location' => $toLocation,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'tax_price' => $taxPrice,
            'sub_total' => $subTotal,
            'grand_total' => $grandTotal,
        ]);
        return $this->createdResponse($insert);
    }

    public function update($id, $request)
    {
        list($fromLocation, $toLocation) = $this->locationJsonEncoder($request);
        $update = DB::table('reservations')
                    ->whereId($id)
                    ->update([
            'vehicle_id' => $request->vehicle_id,
            'user_id' => $request->user_id,
            'from_location' => $fromLocation,
            'to_location' => $toLocation,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
        ]);
        return $this->okResponse($update);
    }

    public function delete($id)
    {
        $delete = DB::table('reservations')
                    ->whereId($id)
                    ->delete();
        return $delete == 1 ? $this->okResponse($delete) : $this->badRequestResponse();
    }

}
