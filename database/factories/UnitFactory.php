<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title' => fake()->text(),
                'description' => fake()->text(),
                'price' => fake()->randomDigit(),
                'rent' => fake()->randomDigit(),
                'image-1' => fake()->text(),
                'image-2' => fake()->text(),
                'image-3' => fake()->text(),
                'image-4' => fake()->text(),
                'image-plan' => fake()->text(),
                'bloc' => fake()->text(),
                'certificate' => fake()->text(),
                'specification_id' => mt_rand(1,7),
                'property_id' => mt_rand(1,7)
        ];
    }
}
