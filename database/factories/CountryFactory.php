<?php

// database/factories/CountryFactory.php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Scholarship;
use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition()
    {
        $countryName = $this->faker->unique()->country;

        // Check if the country name is unique; regenerate if not
        while (Country::where('name', $countryName)->exists()) {
            $countryName = $this->faker->unique()->country;
        }

        return [
            'name' => $countryName,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }

    // Define the relationship with scholarships
    public function configure()
    {
        return $this->afterCreating(function (Country $country) {
            // Create scholarships for the country using the ScholarshipFactory
            Scholarship::factory()->count(3)->create([
                'country_id' => $country->id,
            ]);
        });
    }
}
