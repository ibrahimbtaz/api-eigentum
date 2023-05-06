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
                'image_1' => fake()->text(5),
                'image_2' => fake()->text(5),
                'image_3' => fake()->text(5),
                'image_4' => fake()->text(5),
                'image_plan' => fake()->text(5),
                'bloc' => fake()->randomDigit(),
                'certificate' => fake()->text(5),
                // 'specification_id' => mt_rand(1,7),
                // 'property_id' => mt_rand(1,7)
        ];
    }
}
