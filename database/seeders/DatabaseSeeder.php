<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('en_US'); // Data in English
        $images = [
            'images/team1.jpg', 'images/team2.jpg', 'images/team3.jpg', 'images/team4.jpg',
            'images/team5.jpg', 'images/team6.jpg', 'images/team7.jpg', 'images/team8.jpg',
            'images/team9.jpg', 'images/team10.jpg', 'images/team11.jpg', 'images/team12.jpg'
        ];
        

        foreach (range(1, 100) as $index) {
            Product::create([
                'name' => $faker->randomElement([
                    'Genuine Leather Bracelet',
                    'Luxury Silver Ring',
                    'Heart Pendant Necklace',
                    'Elegant Classic Watch',
                    'Fine Jewelry Set',
                    'Crystal Embellished Brooch',
                    'Delicate Gold Earrings',
                    'Elegant Neck Chain',
                ]),
                'brand' => $faker->company,
                'price' => $faker->randomFloat(2, 500, 5000),
                'image' => $faker->randomElement($images), // Image with 'images/' prefix
            ]);
        }
    }
}
