<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, 
            'status' => $this->faker->randomElement(['0', '1']), 
            'parent_id' => $this->faker->optional()->numberBetween(1, 50),
            'photo' => $this->faker->imageUrl(640, 480, 'categories', true, 'Faker'),
        ];
    }
}
