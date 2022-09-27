<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleFeature extends Model
{
    use HasFactory;

    protected $table = 'vehicle_features';

    public $timestamps = false;

}
