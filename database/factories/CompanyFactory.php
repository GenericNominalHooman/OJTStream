<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "created_at" => now(),
            "updated_at" => now(),
            "email" => $this->faker->email(),
            "telephone_number" => $this->faker->phoneNumber(),
            "address" => $this->faker->address(),
            "name" => $this->faker->company(),
            "type" => $this->faker->randomElement(["private", "public"]),
            "ojt_supervisor" => $this->faker->name(),
            "students_deployed_count" => 0,
        ];
    }
}
