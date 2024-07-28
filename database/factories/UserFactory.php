<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // password
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'photo' => $this->faker->imageUrl(60, 60),
            'role' => 'user', // Make sure the role is 'user'
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'remember_token' => Str::random(10),
        ];
    }
}