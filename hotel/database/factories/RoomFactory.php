<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
     public function definition(): array
        {
            return [
                'room_number' => $this->faker->randomNumber,
                'price'=>$this->faker->randomNumber,
                'description' => $this->faker->paragraph,
                'status' => $this->faker->sentence,
                
                
            ];
        }
}
