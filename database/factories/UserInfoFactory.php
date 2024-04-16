<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1, 200),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'dob' => fake()->date(),
            'nid' => 'https://picsum.photos/id/20/575/350',
        ];
    }
}
