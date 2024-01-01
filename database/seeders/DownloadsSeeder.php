<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DownloadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        $faker = Faker::create();

        // Adjust the loop count based on how many records you want to seed
        for ($i = 0; $i < 10; $i++) {
            DB::table('downloads')->insert([
                'scholarship_id' => random_int(1, 10), // Adjust the range based on your scholarships
                'name' => $faker->sentence,
                'link' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
