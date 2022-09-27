<?php

namespace App\Repositories\Concrete;

use App\Repositories\Abstracts\IVehicleRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponseTrait;
use App\Models\Vehicle;
use App\Http\Resources\VehicleResource;

class VehicleRepository extends BaseRepository implements IVehicleRepository
{
    use ApiResponseTrait;

    public function __construct(public Vehicle $vehicle)
    {
    }

    public function show($id)
    {
        $model = DB::table('vehicles')
                        ->whereId($id)
                        ->get();;
        return $model;
    }

}
