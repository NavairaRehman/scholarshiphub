<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Database\Factories\ScholarshipFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */

   

    public function run(): void
    {
        
        $this->call([
            CountrySeeder::class,
            ScholarshipsSeeder::class,
        ]);
        //Call the UserFactory to seed the 'users' table
        \App\Models\User::factory(10)->create(); 
        
        //Call the ScholarshipFactory to seed the 'scholarships' table
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
