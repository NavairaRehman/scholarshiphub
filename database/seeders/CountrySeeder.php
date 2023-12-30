<?php
// database/seeders/CountrySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        // Delete all previous entries from the countries table
        DB::table('countries')->delete();

        // Insert new countries
        $countries = [
            'USA',
            'Australia',
            'Germany',
            'United Kingdom',
            'South Korea',
        ];

        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'name' => $country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
