<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DokumenOJTPelajar>
 */
class DokumenOJTPelajarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $i = 1;

        return [
             "created_at" => now(),
             "updated_at" => now(),
             "deadline_date" => now()->addWeeks(1),
             "submitted_at" => now(),
             "pelajar_id" => 105,
             "document_name" => "KVOJT00".($i++),
             "document_path" => $this->faker->url(),
             "dokumen_ojt_id" => 1,
        ];
    }
}
