<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition(): array
    {
        $location = [
            'longitude' => $this->faker->latitude(-90, 90),
            'latitude' => $this->faker->latitude(-90, 90)
        ];

        $taxRate = 0.05;
        $grand_total = $this->faker->numerify('##.##');
        $tax_price = $grand_total * $taxRate;
        $sub_total = $grand_total - $tax_price;
    	return [
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
            'vehicle_id' => $this->faker->randomElement(Vehicle::all()->pluck('id')),
            'from_date' => date('Y-m-d', time()),
            'to_date' => date('Y-m-d', time()),
            'from_location' => json_encode($location),
            'to_location' => json_encode($location),
            'tax_price' => $tax_price,
            'sub_total' => $sub_total,
            'grand_total' =>$grand_total,
            'note' => $this->faker->sentence(6, true),
    	];
    }
}
