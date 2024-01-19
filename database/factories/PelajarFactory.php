<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelajar>
 */
class PelajarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $i = 0;

        return [
            "date_started" => now(),
            "date_completed" => now(),
            "created_at" => now(),
            "updated_at" => now(),
            "cohort" => now(),
            "matrix_number" => "AKV0222KA0".($i++),
        ];
    }
}
