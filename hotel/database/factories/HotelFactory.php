<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_name' => $this->faker->company,
            'short_description' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber(),
            'user_id' => 1,
        ];
    }
}
