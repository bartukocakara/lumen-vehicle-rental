<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            UserRoleSeeder::class,

            BrandSeeder::class,
            FeatureSeeder::class,
            VehicleSeeder::class,
            VehicleFeatureSeeder::class,
            VehicleImageSeeder::class,

            ReservationSeeder::class,
        ]);
    }
}
