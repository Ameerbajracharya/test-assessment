<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Population>
 */
class PopulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'populatioin' => $this->faker->randomNumber(),
            'country_id' => $this->faker->numberBetween(1, 5),
            'country_id' => $this->faker->numberBetween(1, 5),
            'country_id' => $this->faker->numberBetween(1, 5),
            'country_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
