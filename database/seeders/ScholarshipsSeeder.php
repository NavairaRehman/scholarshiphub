<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Country; // Add this line

class ScholarshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            // Retrieve valid country IDs from the countries table
            $countryIds = Country::pluck('id')->toArray();

            \DB::table('scholarships')->insert([
                'name' => $faker->sentence,
                'eligibility_age' => $faker->numberBetween(18, 30),
                'qualification' => $faker->sentence,
                'start_date' => $faker->date,
                'deadline' => $faker->date,
                'web_link' => $faker->url,
                'country_id' => $faker->randomElement($countryIds),
                'category_id' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
