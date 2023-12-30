<?php

// database/seeders/CategorySeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Insert data into the categories table
        DB::table('categories')->insert([
            ['name' => 'merit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'need', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'both', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
