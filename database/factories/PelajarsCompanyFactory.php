<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PelajarsCompany>
 */
class PelajarsCompanyFactory extends Factory
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
            "ojt_begin_date" => now(),
            "ojt_end_date" => now()->addMonths(6),
            "role" => $this->faker->sentence(1)." Internship",
            "pelajar_id" => 105,
        ];
    }
}
