<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'test',
             'role' => 'admin',
             'email' => 'test@example.com',
         ]);
         \App\Models\Hotel::factory()->create([
             'hotel_name' => 'Example Hotel',
             'short_description' => 'Discover comfort and luxury at Example Hotel, where modern amenities meet timeless elegance. Immerse yourself in a world of convenience, surrounded by top-notch services and a central location. Your perfect stay awaits.',
             'description' => 'Welcome to Example Hotel, a premier destination that seamlessly blends contemporary comfort with classic sophistication. Our hotel is designed to provide a harmonious retreat for both leisure and business travelers.',
             'email' => 'hotel@example.com',
             'phone' => '123-456-7890',
             'address' => '123 Main Street',
             'city' => 'Cityville',
             'active' => 1,
         ]);
    }
}
