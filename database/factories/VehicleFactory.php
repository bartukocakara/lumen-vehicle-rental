<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ferrariTitleList = [
            'F1 CARBON', 'İTALİA 458 SPIDER', 'CALIFORNIA'
        ];
        $porscheTitleList = [
            'CAYENNE', 'MACAN', 'CAYENNE'
        ];
        $bmwTitleList = [
            '520', '320', 'M SPORT', 'COUPE'
        ];
        $lamborghiniTitleList = [
            'GALLARDO', 'HURACAN', 'URUS', 'AVENTADOR'
        ];

        $fullList = array_merge($ferrariTitleList,
                                $porscheTitleList,
                                $bmwTitleList,
                                $lamborghiniTitleList);
        return [
            'brand_id' => $this->faker->randomElement(Brand::all()->pluck('id')),
            'age'      => $this->faker->numberBetween(0, 20),
            'title'    => $this->faker->randomElement($fullList),
            'price'    => $this->faker->numerify('##.##'),
            'quantity' => $this->faker->numberBetween(1, 100),
            'gear'     => $this->faker->randomElement(['MANUAL', 'AUTOMATIC']),
        ];
    }
}
