<?php

namespace Database\Factories;

use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Role;

class UserRoleFactory extends Factory
{
    protected $model = UserRole::class;

    public function definition(): array
    {
    	return [
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
            'role_id' => $this->faker->randomElement(Role::all()->pluck('id')),
    	];
    }
}
