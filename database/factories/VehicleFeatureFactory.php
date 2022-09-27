<?php

namespace Database\Factories;

use App\Models\VehicleFeature;
use App\Models\Vehicle;
use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFeatureFactory extends Factory
{
    public function definition()
    {
    	return [
            'vehicle_id' => $this->faker->randomElement(Vehicle::all()->pluck('id')),
            'feature_id' => $this->faker->randomElement(Feature::all()->pluck('id')),
    	];
    }
}
