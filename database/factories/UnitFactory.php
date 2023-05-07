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
            'title' => fake()->text(5),
            'description' => fake()->text(5),
            'price' => fake()->randomDigit(),
            'rent' => fake()->randomDigit(),
            'image_1' => fake()->image(),
            'image_2' => fake()->image(),
            'image_3' => fake()->image(),
            'image_4' => fake()->image(),
            'image_plan' => fake()->image(),
            'bloc' => fake()->randomDigit(),
            'certificate' => fake()->text(5),
            // 'specification_id' => mt_rand(1,7),
            // 'property_id' => mt_rand(1,7)
        ];
    }
}
