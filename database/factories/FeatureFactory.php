<?php

namespace Database\Factories;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    protected $model = Feature::class;

    public function definition(): array
    {
        $titleList = [
            'Air conditioning',
            'Color',
            'Size',
            'Convertible',
            'Doors Count',
            'Bags count',
            'Free Cancelation'
        ];
        $key = $this->faker->randomElement($titleList);
        $values = [];
        switch ($key) {
            case 'Air conditioning':
                $values = ['yes', 'no'];
                break;
            case 'Color':
                $values = ['red', 'black', 'white', 'green'];
                break;
            case 'Size':
                $values = ['sm', 'md', 'lg'];
                break;
            case 'Convertible':
                $values = ['yes', 'no'];
                break;
            case 'Doors Count':
                $values = ['2', '3', '4'];
                break;
            case 'Bags count':
                $values = ['2', '3', '4'];
                break;
            case 'Free Cancelation':
                $values = ['yes', 'no'];
                break;
            default:
                # code...
                break;
        }
    	return [
    	    'key' => $key,
    	    'value' => $this->faker->randomElement($values),
    	];
    }
}
