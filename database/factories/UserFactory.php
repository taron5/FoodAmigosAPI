<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'shipping_address' => '16 RUE DE LA REPUBLIQUE IMMEUBLE LE DIAMANT B',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
