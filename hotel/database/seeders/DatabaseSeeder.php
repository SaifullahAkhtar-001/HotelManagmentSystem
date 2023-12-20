<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Hotel;
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
        $facility =  \App\Models\Facility::factory()->create([
            'name' => 'wifi',
        ]);
         $hotel = \App\Models\Hotel::factory()->create([
             'hotel_name' => 'Example Hotel',
             'short_description' => 'Discover comfort and luxury at Example Hotel, where modern amenities meet timeless elegance. Immerse yourself in a world of convenience, surrounded by top-notch services and a central location. Your perfect stay awaits.',
             'description' => 'Welcome to Example Hotel, a premier destination that seamlessly blends contemporary comfort with classic sophistication. Our hotel is designed to provide a harmonious retreat for both leisure and business travelers.',
             'email' => 'hotel@example.com',
             'phone' => '123-456-7890',
             'address' => '123 Main Street',
             'about' => 'Welcome to our exquisite urban oasis, where luxury meets unparalleled comfort. Immerse yourself in a world of sophistication at this hotel, where every detail is crafted for an unforgettable stay.',
             'interior' => [
               'description' => 'Families travelling with kids will find Amboseli national park a safari destination matched to no other, with less tourist traffic, breathtaking open space.'
             ],
             'amenities' => [
               'description' => 'Families travelling with kids will find Amboseli national park a safari destination matched to no other, with less tourist traffic, breathtaking open space.',
                'amenity1' => 'Serene Spa Haven',
                 'amenity1_description' => 'Escape to bliss with our spa`s soothing therapies and revitalizing treatments. Let expert hands melt away stress, leaving you refreshed and rejuvenated.',
                 'amenity2' => 'Sky-high Relaxation',
                 'amenity2_description' => 'Unwind by our rooftop pool with stunning city views. Sip cocktails in chic cabanas, combining luxury with a panoramic urban escape.',
                 'amenity3' => 'Culinary Delights',
                 'amenity3_description' => 'Savor culinary excellence at our award-winning dining venues. Each dish is a celebration of flavors, crafted by our skilled chefs.',
                 'amenity4' => 'Smart Comforts',
                 'amenity4_description' => 'Enjoy a tech-savvy stay with smart room features, seamless connectivity, and modern conveniences at your fingertips.',

             ],
             'city' => 'Cityville',
             'active' => 1,
         ]);

        $hotel->facilities()->attach($facility);

        $facility =  \App\Models\Facility::factory()->create([
            'name' => 'food',
        ]);

        $hotel = \App\Models\Hotel::factory()->create([
             'hotel_name' => 'Example Hotel',
             'short_description' => 'Discover comfort and luxury at Example Hotel, where modern amenities meet timeless elegance. Immerse yourself in a world of convenience, surrounded by top-notch services and a central location. Your perfect stay awaits.',
             'description' => 'Welcome to Example Hotel, a premier destination that seamlessly blends contemporary comfort with classic sophistication. Our hotel is designed to provide a harmonious retreat for both leisure and business travelers.',
             'email' => 'hotel@example.com',
             'phone' => '123-456-7890',
             'address' => '123 Main Street',
             'about' => 'Welcome to our exquisite urban oasis, where luxury meets unparalleled comfort. Immerse yourself in a world of sophistication at this hotel, where every detail is crafted for an unforgettable stay.',
             'interior' => [
               'description' => 'Families travelling with kids will find Amboseli national park a safari destination matched to no other, with less tourist traffic, breathtaking open space.'
             ],
             'amenities' => [
               'description' => 'Families travelling with kids will find Amboseli national park a safari destination matched to no other, with less tourist traffic, breathtaking open space.',
                'amenity1' => 'Serene Spa Haven',
                 'amenity1_description' => 'Escape to bliss with our spa`s soothing therapies and revitalizing treatments. Let expert hands melt away stress, leaving you refreshed and rejuvenated.',
                 'amenity2' => 'Sky-high Relaxation',
                 'amenity2_description' => 'Unwind by our rooftop pool with stunning city views. Sip cocktails in chic cabanas, combining luxury with a panoramic urban escape.',
                 'amenity3' => 'Culinary Delights',
                 'amenity3_description' => 'Savor culinary excellence at our award-winning dining venues. Each dish is a celebration of flavors, crafted by our skilled chefs.',
                 'amenity4' => 'Smart Comforts',
                 'amenity4_description' => 'Enjoy a tech-savvy stay with smart room features, seamless connectivity, and modern conveniences at your fingertips.',

             ],
             'city' => 'Cityville',
             'active' => 1,
         ]);

        \App\Models\ImgGallery::factory()->create([
            'url' => 'random',
            'imagable_id' => 1,
            'imagable_type' => Hotel::class
        ]);

        $hotel->facilities()->attach($facility);


        \App\Models\Roomtype::factory()->create([
            'name' => 'Duplex',
            'description' => 'lorem lorem ......',
            'price' => '123'
        ]);
        \App\Models\Roomtype::factory()->create([
            'name' => 'Economy',
            'description' => 'lorem lorem ......',
            'price' => '13'
        ]);

        \App\Models\WebsiteSettings::factory()->create([
            'showBookingFilter' => '1',
            'button_color' => '#2B35AF',
            'nav_layout' => '2',
        ]);

    }
}
