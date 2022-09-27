<?php

namespace Database\Factories;

use App\Models\VehicleImage;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleImageFactory extends Factory
{

    public function definition()
    {
    	return [
            'vehicle_id' => $this->faker->randomElement(Vehicle::all()->pluck('id')),
            'src' => $this->faker->imageUrl(640, 480),
            "title" => $this->faker->word,

        ];
    }
}
