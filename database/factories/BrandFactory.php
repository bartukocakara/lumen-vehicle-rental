<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        $titleList = [
            'Ferrari',
            'Porsche',
            'Lamborghini',
            'BMW',
        ];
    	return [
    	    'title' => $this->faker->unique()->randomElement($titleList),
    	];
    }
}
