<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penguguman>
 */
class PengugumanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "kupli_id" => 1,
            "tajuk" => $this->faker->sentence(1),
            "penguguman" => $this->faker->sentence(5),
        ];
    }
}
