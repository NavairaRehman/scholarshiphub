<?php

// database/factories/ScholarshipFactory.php

namespace Database\Factories;

use App\Models\Scholarship;
use App\Models\Country;
use App\Models\Category; // Make sure to import the Category model
use Illuminate\Database\Eloquent\Factories\Factory;

class ScholarshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Scholarship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        // Use data from CategorySeeder
        $categoryData = [
            ['name' => 'merit'],
            ['name' => 'need'],
            ['name' => 'both'],
        ];

        return [
            'name' => $this->faker->words(3, true),
            'eligibility_age' => $this->faker->numberBetween(18, 30),
            'qualification' => $this->faker->text,
            'start_date' => $this->faker->date,
            'deadline' => $this->faker->date,
            'web_link' => $this->faker->url,
            'country_id' => $this->faker->numberBetween(1,4),
            'category_id' => function () use ($categoryData) {
                // Randomly choose a category from the CategorySeeder data
                return Category::firstOrCreate($categoryData[array_rand($categoryData)])['id'];
            },
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
