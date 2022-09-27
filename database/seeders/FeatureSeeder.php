<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::insert([
            [
                'key' => 'Air conditioning',
                'value' => true
            ],
            [
                'key' => 'Air conditioning',
                'value' => false
            ],
            [
                'key' => 'Color',
                'value' => 'red'
            ],
            [
                'key' => 'Color',
                'value' => 'black'
            ],
            [
                'key' => 'Color',
                'value' => 'white'
            ],
            [
                'key' => 'Color',
                'value' => 'green'
            ],
            [
                'key' => 'Size',
                'value' => 'sm'
            ],
            [
                'key' => 'Size',
                'value' => 'md'
            ],
            [
                'key' => 'Size',
                'value' => 'lg'
            ],
            [
                'key' => 'Convertible',
                'value' => true
            ],
            [
                'key' => 'Convertible',
                'value' => false
            ],
            [
                'key' => 'Doors Count',
                'value' => '2'
            ],
            [
                'key' => 'Doors Count',
                'value' => '3'
            ],
            [
                'key' => 'Doors Count',
                'value' => '4'
            ],
            [
                'key' => 'Bags Count',
                'value' => '2'
            ],
            [
                'key' => 'Doors Count',
                'value' => '3'
            ],
            [
                'key' => 'Doors Count',
                'value' => '4'
            ],
            [
                'key' => 'Free Cancelation',
                'value' => true
            ],
            [
                'key' => 'Free Cancelation',
                'value' => false
            ],
        ]);
    }
}
