<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            /return [
                'state_name' => $this->faker->unique()->state(),
                'state_image' => $state_image[array_rand($state_image)],
                'state_details' => $this->faker->paragraph(30),
                'living_expenses' => $this->faker->paragraph(20),
                'country_id' => $this->faker->numberBetween(1, 100),
                'created_by' => 1,
            ];
        ];
    }
}
